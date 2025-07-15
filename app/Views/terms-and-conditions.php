<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <section id="about" class="about section" style="margin-top:100px !important;">
        <!-- Section Title -->
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <h1><?= lang('Theme.website-name') ?></h1>
            <h2><?= lang('Theme.pages.' . $slug) ?></h2>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row">
                <div class="col col-md-10 col-lg-8">
                    <p>Terms dan Conditions. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquam sem eget enim dignissim, at ornare nisi facilisis. Praesent orci urna, mattis hendrerit lacus at, posuere mattis augue. Donec eget eros blandit, tincidunt sapien volutpat, pretium orci. In interdum lacus libero, ut condimentum nisl efficitur ut. Curabitur hendrerit leo efficitur erat mollis, at sagittis lorem dictum. Vivamus condimentum fringilla mauris, eu aliquam justo placerat eget. Praesent vitae arcu at urna aliquam elementum a nec metus. In eget bibendum magna. Pellentesque faucibus justo eget neque porta, quis mattis libero pellentesque. Pellentesque vitae magna risus. In non gravida augue. Nunc in diam ex.</p>
                    <p>In egestas sit amet libero ut iaculis. Sed lorem ipsum, pellentesque suscipit lacus ac, sodales luctus justo. Vivamus venenatis facilisis ante at mollis. Integer condimentum lorem eget enim maximus, vitae convallis mi scelerisque. Cras nec justo pharetra, elementum metus nec, ullamcorper velit. In vel ante neque. Nulla tristique rhoncus auctor.</p>
                    <p>Ut porta, quam nec feugiat pretium, lorem odio pulvinar ipsum, non eleifend nisl nunc eu est. Pellentesque vulputate suscipit cursus. Quisque mattis vehicula dui, eu gravida purus. Aliquam eu dolor massa. Mauris in pellentesque augue, sed finibus ante. Nullam semper scelerisque ipsum, ornare accumsan nulla dapibus in. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                    <p>Aliquam odio quam, aliquam et arcu pretium, ultrices condimentum lectus. Nam eu magna condimentum justo efficitur finibus. In hac habitasse platea dictumst. Quisque pulvinar congue arcu quis hendrerit. Sed gravida lectus eros, sed ullamcorper neque molestie a. Duis dapibus diam turpis, sit amet iaculis urna tincidunt a. Aliquam vitae cursus felis. In eros tellus, eleifend vel risus vel, euismod accumsan sem. Etiam pulvinar nunc ut eros rhoncus pharetra. Vivamus placerat egestas est at consequat.</p>
                    <p>Aliquam imperdiet sit amet est sit amet luctus. Morbi commodo lorem arcu. Sed a erat viverra nisl semper dignissim et ac dolor. Nunc ultrices felis id lobortis viverra. Vivamus porttitor diam vitae accumsan ullamcorper. Integer ac efficitur orci. Phasellus posuere, libero non vehicula mattis, urna dolor scelerisque est, id luctus nulla tellus vel turpis. Vivamus tincidunt enim sit amet diam luctus hendrerit. Sed viverra urna vitae pretium ultrices. Donec condimentum ornare tempor. Aenean nec sagittis turpis.</p>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>