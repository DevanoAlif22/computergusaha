@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="HTML5 Template Iteck Multi-Purpose themeforest" />
    <meta name="description" content="Iteck - Multi-Purpose HTML5 Template" />
    <meta name="author" content="" />

    <!-- Title  -->
    <title>OTW Computer Gusaha</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/fav.png" title="Favicon" sizes="16x16" />

    <!-- ====== bootstrap icons cdn ====== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="assets/css/lib/bootstrap.min.css">

    <!-- ====== font family ====== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/css/lib/all.min.css" />
    <link rel="stylesheet" href="assets/css/lib/animate.css" />
    <link rel="stylesheet" href="assets/css/lib/jquery.fancybox.css" />
    <link rel="stylesheet" href="assets/css/lib/lity.css" />
    <link rel="stylesheet" href="assets/css/lib/swiper.min.css" />
    
    <!-- ====== global style ====== -->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

    <!--Contents-->
    <main class="faq-page style-5 section-padding">

        <!-- ====== start faq-tabs style-5 ====== -->
        <section class="faq-tabs style-5">
            <div class="container">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-card active" id="faq1-tab" data-bs-toggle="pill" data-bs-target="#faq1" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            <div class="icon img-contain">
                                <img src="assets/img/icons/users.png" alt="">
                            </div>
                            <div class="info">
                                <h5> About Account </h5>
                                <p> 08 Answer </p>
                            </div>
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-card" id="faq2-tab" data-bs-toggle="pill" data-bs-target="#faq2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        <div class="icon img-contain">
                            <img src="assets/img/icons/protect.png" alt="">
                        </div>
                        <div class="info">
                            <h5> Privacy & Policy </h5>
                            <p> 20 Answer </p>
                        </div>
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-card" id="faq3-tab" data-bs-toggle="pill" data-bs-target="#faq1" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                        <div class="icon img-contain">
                            <img src="assets/img/icons/dollar.png" alt="">
                        </div>
                        <div class="info">
                            <h5> Refund Option </h5>
                            <p> 18 Answer </p>
                        </div>
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-card" id="faq4-tab" data-bs-toggle="pill" data-bs-target="#faq2" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <div class="icon img-contain">
                                <img src="assets/img/icons/24hour.png" alt="">
                            </div>
                            <div class="info">
                                <h5> Support & More </h5>
                                <p> 33 Answer </p>
                            </div>
                        </button>
                    </li>
                </ul>
            </div>
        </section>
        <!-- ====== end faq-tabs style-5 ====== -->


        <!-- ====== end faq-body style-5 ====== -->
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="faq1" role="tabpanel">
                <div class="faq-body">
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-lg-4">
                                <div class="faq-category">
                                    <h5> Question Category: </h5>
                                    <ul>
                                        <li>
                                            <a href="#accordion1" class="active"> Installation </a>
                                            <span> 06 </span>
                                        </li>
                                        <li>
                                            <a href="#accordion2"> Getting Started </a>
                                            <span> 04 </span>
                                        </li>
                                        <li>
                                            <a href="#accordion3"> Page Builder </a>
                                            <span> 03 </span>
                                        </li>
                                        <li>
                                            <a href="#accordion4"> Header Builder </a>
                                            <span> 03 </span>
                                        </li>
                                        <li>
                                            <a href="#accordion5"> Footer Builder </a>
                                            <span> 04 </span>
                                        </li>
                                        <li>
                                            <a href="#accordion6"> Support </a>
                                            <span> 05 </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="faq-questions">
                                    <div class="accordion pt-lg-0" id="accordion1">
                                        <h5 class="sec-title mt-0"> <span> 01. </span> Installation </h5>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bd1" aria-expanded="true" aria-controls="collapseOne">
                                                Global search engine optimization
                                            </button>
                                          </h2>
                                          <div id="bd1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd2" aria-expanded="false" aria-controls="collapseTwo">
                                                Complete Social Media Integration
                                            </button>
                                          </h2>
                                          <div id="bd2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd3" aria-expanded="false" aria-controls="collapseThree">
                                                End-to-end encryption for messages
                                            </button>
                                          </h2>
                                          <div id="bd3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- ------- -->
                                    <div class="accordion" id="accordion2">
                                        <h5 class="sec-title"> <span> 02. </span> Getting Started </h5>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd4">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd4" aria-expanded="true" aria-controls="collapseOne">
                                                What could kill the company?
                                            </button>
                                          </h2>
                                          <div id="bd4" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion2">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd5">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd5" aria-expanded="false" aria-controls="collapseTwo">
                                                Are there any worth being a little proactive about?
                                            </button>
                                          </h2>
                                          <div id="bd5" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion2">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd6">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd6" aria-expanded="false" aria-controls="collapseThree">
                                                What qualities, feelings, attributes do we want?
                                            </button>
                                          </h2>
                                          <div id="bd6" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion2">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- ------- -->
                                    <div class="accordion" id="accordion3">
                                        <h5 class="sec-title"> <span> 03. </span> Page Builder </h5>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd7">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd7" aria-expanded="true" aria-controls="collapseOne">
                                                Materially help someone else with their priorities?
                                            </button>
                                          </h2>
                                          <div id="bd7" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion3">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd8">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd8" aria-expanded="false" aria-controls="collapseTwo">
                                                To poor or missing internal communication?
                                            </button>
                                          </h2>
                                          <div id="bd8" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion3">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd9">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd9" aria-expanded="false" aria-controls="collapseThree">
                                                We address those with features or marketing?
                                            </button>
                                          </h2>
                                          <div id="bd9" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion3">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- ------- -->
                                    <div class="accordion" id="accordion4">
                                        <h5 class="sec-title"> <span> 04. </span> Header Builder </h5>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd7">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd7" aria-expanded="true" aria-controls="collapseOne">
                                                How could we all impact that metric?
                                            </button>
                                          </h2>
                                          <div id="bd7" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion4">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd8">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd8" aria-expanded="false" aria-controls="collapseTwo">
                                                That we’re not listening to?
                                            </button>
                                          </h2>
                                          <div id="bd8" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion4">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd9">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd9" aria-expanded="false" aria-controls="collapseThree">
                                                How would we accomplish that?
                                            </button>
                                          </h2>
                                          <div id="bd9" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion4">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- ------- -->
                                    <div class="accordion" id="accordion5">
                                        <h5 class="sec-title"> <span> 05. </span> Footer Builder </h5>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd10">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd10" aria-expanded="true" aria-controls="collapseOne">
                                                If all our source code were stolen, would it matter?
                                            </button>
                                          </h2>
                                          <div id="bd10" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion5">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd11">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd11" aria-expanded="false" aria-controls="collapseTwo">
                                                We do differently such that it wouldn’t matter?
                                            </button>
                                          </h2>
                                          <div id="bd11" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion5">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd12">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd12" aria-expanded="false" aria-controls="collapseThree">
                                                How could we institutionalize communicating it?
                                            </button>
                                          </h2>
                                          <div id="bd12" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion5">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- ------- -->
                                    <div class="accordion" id="accordion6">
                                        <h5 class="sec-title"> <span> 06. </span> Support </h5>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd13">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd13" aria-expanded="true" aria-controls="collapseOne">
                                                About you that not many people know?
                                            </button>
                                          </h2>
                                          <div id="bd13" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion6">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd14">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd14" aria-expanded="false" aria-controls="collapseTwo">
                                                What should we do about that?
                                            </button>
                                          </h2>
                                          <div id="bd14" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion6">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd15">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd15" aria-expanded="false" aria-controls="collapseThree">
                                                What should we do soon to prevent some of that?
                                            </button>
                                          </h2>
                                          <div id="bd15" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion6">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="faq2" role="tabpanel">
                <div class="faq-body">
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-lg-4">
                                <div class="faq-category">
                                    <h5> Question Category: </h5>
                                    <ul>
                                        <li>
                                            <a href="#accordion1" class="active"> Installation </a>
                                            <span> 06 </span>
                                        </li>
                                        <li>
                                            <a href="#accordion2"> Getting Started </a>
                                            <span> 04 </span>
                                        </li>
                                        <li>
                                            <a href="#accordion3"> Page Builder </a>
                                            <span> 03 </span>
                                        </li>
                                        <li>
                                            <a href="#accordion4"> Header Builder </a>
                                            <span> 03 </span>
                                        </li>
                                        <li>
                                            <a href="#accordion5"> Footer Builder </a>
                                            <span> 04 </span>
                                        </li>
                                        <li>
                                            <a href="#accordion6"> Support </a>
                                            <span> 05 </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="faq-questions">
                                    <div class="accordion pt-lg-0" id="accordion1">
                                        <h5 class="sec-title mt-0"> <span> 01. </span> Installation </h5>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bd1" aria-expanded="true" aria-controls="collapseOne">
                                                Global search engine optimization
                                            </button>
                                          </h2>
                                          <div id="bd1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd2" aria-expanded="false" aria-controls="collapseTwo">
                                                Complete Social Media Integration
                                            </button>
                                          </h2>
                                          <div id="bd2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd3" aria-expanded="false" aria-controls="collapseThree">
                                                End-to-end encryption for messages
                                            </button>
                                          </h2>
                                          <div id="bd3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- ------- -->
                                    <div class="accordion" id="accordion2">
                                        <h5 class="sec-title"> <span> 02. </span> Getting Started </h5>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd4">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd4" aria-expanded="true" aria-controls="collapseOne">
                                                What could kill the company?
                                            </button>
                                          </h2>
                                          <div id="bd4" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion2">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd5">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd5" aria-expanded="false" aria-controls="collapseTwo">
                                                Are there any worth being a little proactive about?
                                            </button>
                                          </h2>
                                          <div id="bd5" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion2">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd6">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd6" aria-expanded="false" aria-controls="collapseThree">
                                                What qualities, feelings, attributes do we want?
                                            </button>
                                          </h2>
                                          <div id="bd6" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion2">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- ------- -->
                                    <div class="accordion" id="accordion3">
                                        <h5 class="sec-title"> <span> 03. </span> Page Builder </h5>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd7">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd7" aria-expanded="true" aria-controls="collapseOne">
                                                Materially help someone else with their priorities?
                                            </button>
                                          </h2>
                                          <div id="bd7" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion3">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd8">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd8" aria-expanded="false" aria-controls="collapseTwo">
                                                To poor or missing internal communication?
                                            </button>
                                          </h2>
                                          <div id="bd8" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion3">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd9">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd9" aria-expanded="false" aria-controls="collapseThree">
                                                We address those with features or marketing?
                                            </button>
                                          </h2>
                                          <div id="bd9" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion3">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- ------- -->
                                    <div class="accordion" id="accordion4">
                                        <h5 class="sec-title"> <span> 04. </span> Header Builder </h5>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd7">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd7" aria-expanded="true" aria-controls="collapseOne">
                                                How could we all impact that metric?
                                            </button>
                                          </h2>
                                          <div id="bd7" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion4">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd8">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd8" aria-expanded="false" aria-controls="collapseTwo">
                                                That we’re not listening to?
                                            </button>
                                          </h2>
                                          <div id="bd8" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion4">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd9">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd9" aria-expanded="false" aria-controls="collapseThree">
                                                How would we accomplish that?
                                            </button>
                                          </h2>
                                          <div id="bd9" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion4">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- ------- -->
                                    <div class="accordion" id="accordion5">
                                        <h5 class="sec-title"> <span> 05. </span> Footer Builder </h5>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd10">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd10" aria-expanded="true" aria-controls="collapseOne">
                                                If all our source code were stolen, would it matter?
                                            </button>
                                          </h2>
                                          <div id="bd10" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion5">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd11">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd11" aria-expanded="false" aria-controls="collapseTwo">
                                                We do differently such that it wouldn’t matter?
                                            </button>
                                          </h2>
                                          <div id="bd11" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion5">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd12">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd12" aria-expanded="false" aria-controls="collapseThree">
                                                How could we institutionalize communicating it?
                                            </button>
                                          </h2>
                                          <div id="bd12" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion5">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- ------- -->
                                    <div class="accordion" id="accordion6">
                                        <h5 class="sec-title"> <span> 06. </span> Support </h5>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd13">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd13" aria-expanded="true" aria-controls="collapseOne">
                                                About you that not many people know?
                                            </button>
                                          </h2>
                                          <div id="bd13" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion6">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd14">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd14" aria-expanded="false" aria-controls="collapseTwo">
                                                What should we do about that?
                                            </button>
                                          </h2>
                                          <div id="bd14" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion6">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="hd15">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bd15" aria-expanded="false" aria-controls="collapseThree">
                                                What should we do soon to prevent some of that?
                                            </button>
                                          </h2>
                                          <div id="bd15" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion6">
                                            <div class="accordion-body">
                                                <div class="text">
                                                    Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets. The Sass Script is the scripting language itself. Sass consists of two syntaxes.
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== end faq-body style-5 ====== -->
        
    </main>
    <!--End-Contents-->



    <!-- ====== start to top button ====== -->
    <a href="#" class="to_top bg-gray rounded-circle icon-40 d-inline-flex align-items-center justify-content-center">
        <i class="bi bi-chevron-up fs-6 text-dark"></i>
    </a>
    <!-- ====== end to top button ====== -->

    <!-- ====== request ====== -->
    <script src="assets/js/lib/jquery-3.0.0.min.js"></script>
    <script src="assets/js/lib/jquery-migrate-3.0.0.min.js"></script>
    <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
    <script src="assets/js/lib/wow.min.js"></script>
    <script src="assets/js/lib/jquery.fancybox.js"></script>
    <script src="assets/js/lib/lity.js"></script>
    <script src="assets/js/lib/swiper.min.js"></script>
    <script src="assets/js/lib/jquery.waypoints.min.js"></script>
    <script src="assets/js/lib/jquery.counterup.js"></script>
    <!-- <script src="assets/js/lib/pace.js"></script> -->
    <script src="assets/js/lib/scrollIt.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html> 
@endsection