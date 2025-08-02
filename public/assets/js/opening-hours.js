document.addEventListener("DOMContentLoaded", function(){
    const openingHours = {
        MON: ["08:00", "23:00"],
        TUE: ["08:00", "23:00"],
        WED: ["08:00", "23:00"],
        THU: ["08:00", "23:00"],
        FRI: ["08:00", "23:00"],
        SAT: ["08:00", "23:00"],
        SUN: ["08:00", "23:00"],
    };
    function isOpenNow(openingHours) {
        const { DateTime } = luxon;
        const now = DateTime.now().setZone("Pacific/Auckland");
        const weekdays = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
        const todayStr = weekdays[now.weekday % 7]; // because Luxon week starts with Monday=1
        const todayHours = openingHours[todayStr];
        if (todayHours && todayHours.length === 2) {
            const [start, end] = todayHours;
            const startTime = DateTime.fromFormat(start, "HH:mm", { zone: "Pacific/Auckland" }).set({year: now.year, month: now.month, day: now.day});
            const endTime = DateTime.fromFormat(end, "HH:mm", { zone: "Pacific/Auckland" }).set({year: now.year, month: now.month, day: now.day});
            if (now >= startTime && now <= endTime) {
                return { isOpen: true, nextOpening: null };
            }
        }
        // If closed, find the next open day
        for (let i = 1; i <= 7; i++) {
            const checkDate = now.plus({ days: i });
            const checkDayStr = weekdays[checkDate.weekday % 7];
            const hours = openingHours[checkDayStr];
            if (hours && hours.length === 2) {
                const [nextStart] = hours;
                const [hour, minute] = nextStart.split(':').map(Number);
                const nextOpeningTime = checkDate.set({ hour, minute, second: 0, millisecond: 0 });
                return {
                    isOpen: false,
                    nextOpening: nextOpeningTime.toFormat('d LLL, h:mm a')
                };
            }
        }
        return { isOpen: false, nextOpening: '' };
    }
    const result = isOpenNow(openingHours);
    if (this_page_slug && 'home' === this_page_slug) {
        if (result.isOpen) {
            document.getElementById('home-page-opening-hours-opened').style.display = 'block';
        } else {
            document.getElementById('home-page-opening-hours-closed').style.display = 'block';
            if ('' === result.nextOpening) {
                document.getElementById('home-page-opening-hours-next-label').style.display = 'none';
            } else {
                document.getElementById('home-page-opening-hours-next').innerHTML = result.nextOpening;
            }
        }
    }
});