<link rel="stylesheet" href="<?= base_url() ?>assets/css/pricing.css">
<section class="services-section ftco-section" id="about-section">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4">ABOUT</h2>
                <p>Selamat datang di website Bimbel Attin Bimbel
                </p>
            </div>
        </div>
        <div class="row no-gutters d-flex">
            <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-center">
                    <img src="images/tangan.png" alt="">
                    <div class="media-body">
                        <h3 class="heading mb-3">Niat</h3>
                        <p>Menanamkan niat belajar dengan tulus</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-center">
                    <img src="images/help.png" alt="">
                    <div class="media-body">
                        <h3 class="heading mb-3">Usaha</h3>
                        <p>Memiliki usaha yang baik</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-center">
                    <img src="images/transparency.png" alt="">
                    <div class="media-body">
                        <h3 class="heading mb-3">Tawakal</h3>
                        <p>Bertawakal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-section ftco-section" id="vm-section">
    <div class="containerr">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4"> Visi Dan Misi</h2>
            </div>
        </div>
        <hr>
        VISI:<br>
        Menjadi lembaga bimbingan belajar terdepan yang berkomitmen mencetak generasi cerdas, berprestasi, dan berkarakter unggul untuk menghadapi tantangan global<br>
        <br><br>
        MISI:<br>
        1.	Menyediakan layanan bimbingan belajar yang berkualitas dengan metode pengajaran inovatif dan interaktif.
2.	Membantu siswa mencapai potensi akademik terbaik melalui pendekatan personal dan strategi pembelajaran efektif.
3.	Mengembangkan program bimbingan yang relevan dengan kebutuhan kurikulum nasional dan tuntutan era digital.
4.	Memberikan pelatihan intensif kepada tenaga pengajar untuk memastikan kualitas pembelajaran yang optimal.
5.	Menciptakan lingkungan belajar yang kondusif, inklusif, dan memotivasi siswa untuk meraih kesuksesan akademik.
6.	Berkontribusi dalam mencerdaskan kehidupan bangsa dengan mempersiapkan generasi penerus yang kompeten dan berintegritas.

    </div>
</section>


<section class="services-section ftco-section" id="Tujuan-section">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4">Paket Pilihan</h2>
                <div class="row mt-5">

                    <?php foreach ($jeprog as $jp) : ?>

                        <div class="col-md-4">

                            <!--PRICE CONTENT START-->
                            <div class="generic_content border shadow clearfix">

                                <!--HEAD PRICE DETAIL START-->
                                <div class="generic_head_price clearfix">

                                    <!--HEAD CONTENT START-->
                                    <div class="generic_head_content clearfix">

                                        <!--HEAD START-->
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span><?= $jp['nama_program'] ?></span>
                                        </div>
                                        <!--//HEAD END-->

                                    </div>
                                    <!--//HEAD CONTENT END-->

                                    <!--PRICE START-->
                                    <div class="generic_price_tag clearfix">
                                        <span class="price">
                                            <span class="sign">Rp</span>
                                            <span class="currency"><?= $jp['harga'] ?></span>

                                            <span class="month">/Semester</span>
                                        </span>
                                    </div>
                                    <!--//PRICE END-->

                                </div>
                                <!--//HEAD PRICE DETAIL END-->

                                <!--FEATURE LIST START-->
                                <div class="generic_feature_list">
                                    <ul>

                                        <li><span><?= $jp['kuota'] ?></span> Kuota</li>
                                    </ul>
                                </div>

                                <!--//FEATURE LIST END-->

                                <!--BUTTON START-->
                                <?php if ($jp['kuota'] != 0) { ?>
                                    <div class="generic_price_btn clearfix">
                                        <a href="<?= base_url(); ?>paket/registrasi/<?= $jp['id']; ?>" class="" onclick="return confirm('Yakin ingin memilih paket ini?');">Pilih</a>
                                    </div>
                                <?php } else { ?>
                                    <div class=" clearfix">
                                        <a href="#" class="">Kuota Untuk Program Ini Habis</a>
                                    </div>
                                <?php } ?>



                                <!--//BUTTON END-->

                            </div>
                            <!--//PRICE CONTENT END-->

                        </div>
                    <?php endforeach; ?>


                </div>

            </div>
        </div>

    </div>
</section>