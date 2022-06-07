@extends('layout')

@section('title') Administrarea caminelor @endsection
@section('main_content')

    <section class="slider_section">
        <div class="container">
            <div class="row">
                <div>
    <div class="col-md-10">
        <div class="full-slider_cont">
            <h1>Pagina Studenţilor pentru<br>
                <span class="dark_brown">administrarea caminului studenţesc</span></h1>
            <p>Pentru ca cei care nu sunt din Chişinău, recomandăm să trăiţi cea mai bună experienţă a vieţii dvs,<br>
                în căminele UTM, unde veţi întâlni prieteni noi şi veţi putea explora tărâmul cunoştinţelor.<br>
                Studentul va putea alege o cameră unde să stea, în dependenţă de către planurile propuse de către administraţia UTM<br></p>
        </div>
    </div>
    </div>
    </div>
    </div>
    </section>

    <div class="Currency">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Pachetele de comodităţi <strong class="cur">ale căminelor UTM</strong></h2>
                        <span><img src="images/boder.png" alt="img"/> </span> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="three-box">
                        <figure><img src="images/minim_necesar.jpg" alt="img"/></figure>
                        <div class="pachete_comoditati"><span style="font-size: xx-large;">**</span>
                            <h3>Minim necesar</h3>
                            <ul>
                                <li>+ 5 colegi în cameră</li>
                                <li>+ Căldură/pat/o masă de studii</li>
                                <li>+ wifi</li>
                                <li>+ Baie pe hol</li>
                                <li>- Fibra optica</li>
                                <li>- Reparatie euro</li>
                                <li>- Parter</li>
                                <li>- Biblioteca cu carţi de studiu</li>
                                <li>- Izolată fonic</li>
                                <li>- Frigider/microunda</li>
                                <li>- Loc de parcare</li>
                            </ul>
                        </div>
                        <a class="read-more" href="panou_informativ.php">Detalii</a> </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="three-box">
                        <figure><img src="images/standart.png" alt="img"/></figure>
                        <div class="pachete_comoditati"> <span style="font-size: xx-large;">***</span>
                            <h3>Standard</h3>
                            <ul>
                                <li>+ 2 colegi în cameră</li>
                                <li>+ Căldură/pat/o masă de studii</li>
                                <li>+ wifi</li>
                                <li>+ Baie pe hol</li>
                                <li>+ Fibra optica</li>
                                <li>+ Biblioteca cu carţi de studiu</li>
                                <li>- Parter</li>
                                <li>- Izolată fonic</li>
                                <li>- Frigider/microunda</li>
                            </ul>
                        </div>
                        <a class="read-more" href="panou_informativ.php">Detalii</a> </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="three-box">
                        <figure><img src="images/superior.jpg" alt="img"/></figure>
                        <div class="pachete_comoditati"> <span style="font-size: xx-large;">****</span>
                            <h3>Superior</h3>
                            <ul>
                                <li>+ 1-2 colegi în cameră</li>
                                <li>+ Căldură/pat/o masă de studii</li>
                                <li>+ wifi</li>
                                <li>+ Baie pe hol</li>
                                <li>+ Fibra optica</li>
                                <li>+ Reparatie euro</li>
                                <li>+ Biblioteca cu carţi de studiu</li>
                                <li>+ Parter</li>
                                <li>+ Izolată fonic</li>
                                <li>+ Frigider/microunda</li>
                                <li>+ Loc de parcare</li>
                            </ul>
                        </div>
                        <a class="read-more" href="panou_informativ.php">Detalii</a> </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
