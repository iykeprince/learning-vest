<?php require_once "views/templates/header.php"; ?>

<?php require_once "views/templates/preloader.php"; ?>
        <!-- Drawer Layout -->
     
        <div class="mdk-drawer-layout js-mdk-drawer-layout"
             data-push
             data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page-content">

                <!-- Header -->

                <?php require_once 'views/templates/nav.php'; ?>
                <!-- // END Header -->

                <!-- BEFORE Page Content -->

                <!-- // END BEFORE Page Content -->

                <!-- Page Content -->

                <div class="mdk-box bg-primary js-mdk-box mb-0"
                     data-effects="blend-background">
                    <div class="mdk-box__content">
                        <div class="hero py-64pt text-center text-sm-left">
                            <div class="container page__container">
                                <h1 class="text-white"><?= $this->course['title']; ?></h1>
                                <p class="lead text-white-50 measure-hero-lead"><?= $this->course['description']; ?></p>
                                <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                                    <a href="student-lesson.html"
                                       class="btn btn-outline-white mb-16pt mb-sm-0 mr-sm-16pt">Watch trailer <i class="material-icons icon--right">play_circle_outline</i></a>
                                    <a href="pricing.html"
                                       class="btn btn-white">Start your free trial</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="navbar navbar-expand-sm navbar-light bg-white border-bottom-2 navbar-list p-0 m-0 align-items-center">
                    <div class="container page__container">
                        <ul class="nav navbar-nav flex align-items-sm-center">
                            <li class="nav-item navbar-list__item">
                                <div class="media align-items-center">
                                    <span class="media-left mr-16pt">
                                        <img src="../../public/images/people/50/guy-6.jpg"
                                             width="40"
                                             alt="avatar"
                                             class="rounded-circle">
                                    </span>
                                    <div class="media-body">
                                        <a class="card-title m-0"
                                           href="teacher-profile.html"><?= $this->course['name']; ?></a>
                                        <p class="text-50 lh-1 mb-0">Instructor</p>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item navbar-list__item">
                                <i class="material-icons text-muted icon--left">schedule</i>
                                <?= $this->course['hours']; ?> hrs
                            </li>
                            <li class="nav-item navbar-list__item">
                                <i class="material-icons text-muted icon--left">assessment</i>
                                <?= $this->course['level']; ?>
                            </li>
                            <li class="nav-item ml-sm-auto text-sm-center flex-column navbar-list__item">
                                <div class="rating rating-24">
                                    <div class="rating__item"><i class="material-icons">star</i></div>
                                    <div class="rating__item"><i class="material-icons">star</i></div>
                                    <div class="rating__item"><i class="material-icons">star</i></div>
                                    <div class="rating__item"><i class="material-icons">star</i></div>
                                    <div class="rating__item"><i class="material-icons">star_border</i></div>
                                </div>
                                <p class="lh-1 mb-0"><small class="text-muted">20 ratings</small></p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="page-section">
                    <div class="container page__container">
                        <div class="page-heading">
                            <h4>Lessons</h4>
                            <a href="library-development.html"
                               class="ml-sm-auto text-underline">See Development Courses</a>
                        </div>

                        <div class="position-relative carousel-card">
                            <div class="js-mdk-carousel row d-block"
                                 id="carousel-courses1">

                                <a class="carousel-control-next js-mdk-carousel-control mt-n24pt"
                                   href="#carousel-courses1"
                                   role="button"
                                   data-slide="next">
                                    <span class="carousel-control-icon material-icons"
                                          aria-hidden="true">keyboard_arrow_right</span>
                                    <span class="sr-only">Next</span>
                                </a>

                                <div class="mdk-carousel__content">

                                    <?php if($this->lessons): ?>
                                    <?php foreach($this->lessons as $key => $value): ?>
                                    <div class="col-12 col-sm-6 col-md-4 col-xl-4">

                                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay mdk-reveal js-mdk-reveal "
                                             data-partial-height="44"
                                             data-toggle="popover"
                                             data-trigger="click">

                                            <a href="student-course.html"
                                               class="js-image"
                                               data-position="">
                                                <!-- <img src=""
                                                     alt="course"> -->
                                                <div style="height: 240px">
                                                <?= $value['youtube_url']; ?>
                                                </div>
                                                <span class="overlay__content align-items-start justify-content-start">
                                                    <span class="overlay__action card-body d-flex align-items-center">
                                                        <i class="material-icons mr-4pt">play_circle_outline</i>
                                                        <span class="card-title text-white">Preview</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <span class="corner-ribbon corner-ribbon--default-right-top corner-ribbon--shadow bg-accent text-white">NEW</span>

                                            <div class="mdk-reveal__content">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex">
                                                            <a class="card-title"
                                                               href="student-course.html"><?= $value['title']; ?> <?= $value['video_id']; ?></a>
                                                            <small class="text-50 font-weight-bold mb-4pt"><?= $value['name']; ?></small>
                                                        </div>
                                                        <a href="student-course.html"
                                                           data-toggle="tooltip"
                                                           data-title="Add Favorite"
                                                           data-placement="top"
                                                           data-boundary="window"
                                                           class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="rating flex">
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                        </div>
                                                        <small class="text-50">6 hours</small>
                                                    </div>
                                                    <div class="col text-right">
                                                    <a href="student-course.html"
                                                       class="btn btn-primary">Watch</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <?php endforeach; ?>
                                    <?php endif; ?>

                                    <!-- <div class="col-12 col-sm-6 col-md-4 col-xl-3">

                                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay mdk-reveal js-mdk-reveal "
                                             data-partial-height="44"
                                             data-toggle="popover"
                                             data-trigger="click">

                                            <a href="student-course.html"
                                               class="js-image"
                                               data-position="">
                                                <img src="../../public/images/paths/swift_430x168.png"
                                                     alt="course">
                                                <span class="overlay__content align-items-start justify-content-start">
                                                    <span class="overlay__action card-body d-flex align-items-center">
                                                        <i class="material-icons mr-4pt">play_circle_outline</i>
                                                        <span class="card-title text-white">Preview</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <div class="mdk-reveal__content">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex">
                                                            <a class="card-title"
                                                               href="student-course.html">Build an iOS Application in Swift</a>
                                                            <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                                                        </div>
                                                        <a href="student-course.html"
                                                           data-toggle="tooltip"
                                                           data-title="Remove Favorite"
                                                           data-placement="top"
                                                           data-boundary="window"
                                                           class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite</a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="rating flex">
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                        </div>
                                                        <small class="text-50">6 hours</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left mr-12pt">
                                                    <img src="../../public/images/paths/swift_40x40%402x.png"
                                                         width="40"
                                                         height="40"
                                                         alt="Angular"
                                                         class="rounded">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Build an iOS Application in Swift</div>
                                                    <p class="lh-1 mb-0">
                                                        <span class="text-50 small">with</span>
                                                        <span class="text-50 small font-weight-bold">Elijah Murray</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>

                                            <div class="mb-16pt">
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                                                </div>
                                            </div>

                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="d-flex align-items-center mb-4pt">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-4pt">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
                                                    </div>
                                                </div>
                                                <div class="col text-right">
                                                    <a href="student-course.html"
                                                       class="btn btn-primary">Watch trailer</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 col-xl-3">

                                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay mdk-reveal js-mdk-reveal "
                                             data-partial-height="44"
                                             data-toggle="popover"
                                             data-trigger="click">

                                            <a href="student-course.html"
                                               class="js-image"
                                               data-position="">
                                                <img src="../../public/images/paths/wordpress_430x168.png"
                                                     alt="course">
                                                <span class="overlay__content align-items-start justify-content-start">
                                                    <span class="overlay__action card-body d-flex align-items-center">
                                                        <i class="material-icons mr-4pt">play_circle_outline</i>
                                                        <span class="card-title text-white">Preview</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <div class="mdk-reveal__content">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex">
                                                            <a class="card-title"
                                                               href="student-course.html">Build a WordPress Website</a>
                                                            <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                                                        </div>
                                                        <a href="student-course.html"
                                                           data-toggle="tooltip"
                                                           data-title="Add Favorite"
                                                           data-placement="top"
                                                           data-boundary="window"
                                                           class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="rating flex">
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                        </div>
                                                        <small class="text-50">6 hours</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left mr-12pt">
                                                    <img src="../../public/images/paths/wordpress_40x40%402x.png"
                                                         width="40"
                                                         height="40"
                                                         alt="Angular"
                                                         class="rounded">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Build a WordPress Website</div>
                                                    <p class="lh-1 mb-0">
                                                        <span class="text-50 small">with</span>
                                                        <span class="text-50 small font-weight-bold">Elijah Murray</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>

                                            <div class="mb-16pt">
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                                                </div>
                                            </div>

                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="d-flex align-items-center mb-4pt">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-4pt">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
                                                    </div>
                                                </div>
                                                <div class="col text-right">
                                                    <a href="student-course.html"
                                                       class="btn btn-primary">Watch trailer</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div> -->

                                    <!-- <div class="col-12 col-sm-6 col-md-4 col-xl-3">

                                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay mdk-reveal js-mdk-reveal "
                                             data-partial-height="44"
                                             data-toggle="popover"
                                             data-trigger="click">

                                            <a href="student-course.html"
                                               class="js-image"
                                               data-position="left">
                                                <img src="../../public/images/paths/react_430x168.png"
                                                     alt="course">
                                                <span class="overlay__content align-items-start justify-content-start">
                                                    <span class="overlay__action card-body d-flex align-items-center">
                                                        <i class="material-icons mr-4pt">play_circle_outline</i>
                                                        <span class="card-title text-white">Preview</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <div class="mdk-reveal__content">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex">
                                                            <a class="card-title"
                                                               href="student-course.html">Become a React Native Developer</a>
                                                            <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                                                        </div>
                                                        <a href="student-course.html"
                                                           data-toggle="tooltip"
                                                           data-title="Add Favorite"
                                                           data-placement="top"
                                                           data-boundary="window"
                                                           class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="rating flex">
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                        </div>
                                                        <small class="text-50">6 hours</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left mr-12pt">
                                                    <img src="../../public/images/paths/react_40x40%402x.png"
                                                         width="40"
                                                         height="40"
                                                         alt="Angular"
                                                         class="rounded">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Become a React Native Developer</div>
                                                    <p class="lh-1 mb-0">
                                                        <span class="text-50 small">with</span>
                                                        <span class="text-50 small font-weight-bold">Elijah Murray</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>

                                            <div class="mb-16pt">
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                                                </div>
                                            </div>

                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="d-flex align-items-center mb-4pt">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-4pt">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                                        <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
                                                    </div>
                                                </div>
                                                <div class="col text-right">
                                                    <a href="student-course.html"
                                                       class="btn btn-primary">Watch trailer</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div> -->

                                </div>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="page-section bg-white border-bottom-2">

                    <div class="container page__container">
                        <div class="row ">
                            <div class="col-md-7">
                                <div class="page-separator">
                                    <div class="page-separator__text">About this course</div>
                                </div>
                                <p class="text-70">This course will teach you the fundamentals o*f working with Angular 2. You *will learn everything you need to know to create complete applications including: components, services, directives, pipes, routing, HTTP, and even testing.</p>
                                <p class="text-70 mb-0">This course will teach you the fundamentals o*f working with Angular 2. You *will learn everything you need to know to create complete applications including: components, services, directives, pipes, routing, HTTP, and even testing.</p>
                            </div>
                            <div class="col-md-5">
                                <div class="page-separator">
                                    <div class="page-separator__text bg-white">What you’ll learn</div>
                                </div>
                                <ul class="list-unstyled">
                                    <li class="d-flex align-items-center">
                                        <span class="material-icons text-50 mr-8pt">check</span>
                                        <span class="text-70">Fundamentals of working with Angular</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="material-icons text-50 mr-8pt">check</span>
                                        <span class="text-70">Create complete Angular applications</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="material-icons text-50 mr-8pt">check</span>
                                        <span class="text-70">Working with the Angular CLI</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="material-icons text-50 mr-8pt">check</span>
                                        <span class="text-70">Understanding Dependency Injection</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="material-icons text-50 mr-8pt">check</span>
                                        <span class="text-70">Testing with Angular</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="page-section bg-white border-bottom-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 mb-24pt mb-md-0">
                                <h4>About the author</h4>
                                <p class="text-70 mb-24pt">Eddie Bryan is a software developer at LearnD*ash. With more than 20 years o*f software development experience, he has gained a passion for Agile software development -- especially Lean.</p>

                                <div class="page-separator">
                                    <div class="page-separator__text bg-white">More from the author</div>
                                </div>

                                <div class="card card-sm mb-8pt">
                                    <div class="card-body d-flex align-items-center">
                                        <a href="course.html"
                                           class="avatar avatar-4by3 mr-12pt">
                                            <img src="public/images/paths/angular_routing_200x168.png"
                                                 alt="Angular Routing In-Depth"
                                                 class="avatar-img rounded">
                                        </a>
                                        <div class="flex">
                                            <a class="card-title mb-4pt"
                                               href="course.html">Angular Routing In-Depth</a>
                                            <div class="d-flex align-items-center">
                                                <div class="rating mr-8pt">

                                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>

                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>

                                                </div>
                                                <small class="text-muted">3/5</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-sm mb-16pt">
                                    <div class="card-body d-flex align-items-center">
                                        <a href="course.html"
                                           class="avatar avatar-4by3 mr-12pt">
                                            <img src="public/images/paths/angular_testing_200x168.png"
                                                 alt="Angular Unit Testing"
                                                 class="avatar-img rounded">
                                        </a>
                                        <div class="flex">
                                            <a class="card-title mb-4pt"
                                               href="course.html">Angular Unit Testing</a>
                                            <div class="d-flex align-items-center">
                                                <div class="rating mr-8pt">

                                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                                    <span class="rating__item"><span class="material-icons">star_border</span></span>

                                                </div>
                                                <small class="text-muted">4/5</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group list-group-flush">
                                    <div class="list-group-item px-0">
                                        <a href="#"
                                           class="card-title mb-4pt">Angular Best Practices</a>
                                        <p class="lh-1 mb-0">
                                            <small class="text-muted mr-8pt">6h 40m</small>
                                            <small class="text-muted mr-8pt">13,876 Views</small>
                                            <small class="text-muted">13 May 2018</small>
                                        </p>
                                    </div>
                                    <div class="list-group-item px-0">
                                        <a href="#"
                                           class="card-title mb-4pt">Unit Testing in Angular</a>
                                        <p class="lh-1 mb-0">
                                            <small class="text-muted mr-8pt">6h 40m</small>
                                            <small class="text-muted mr-8pt">13,876 Views</small>
                                            <small class="text-muted">13 May 2018</small>
                                        </p>
                                    </div>
                                    <div class="list-group-item px-0">
                                        <a href="#"
                                           class="card-title mb-4pt">Migrating Applications from AngularJS to Angular</a>
                                        <p class="lh-1 mb-0">
                                            <small class="text-muted mr-8pt">6h 40m</small>
                                            <small class="text-muted mr-8pt">13,876 Views</small>
                                            <small class="text-muted">13 May 2018</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 pt-sm-32pt pt-md-0 d-flex flex-column align-items-center justify-content-start">
                                <div class="text-center">
                                    <p class="mb-16pt">
                                        <img src="../../public/images/people/110/guy-6.jpg"
                                             alt="guy-6"
                                             class="rounded-circle"
                                             width="64">
                                    </p>
                                    <h4 class="m-0">Eddie Bryan</h4>
                                    <p class="lh-1">
                                        <small class="text-muted">Angular, Web Development</small>
                                    </p>
                                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                                        <a href="teacher-profile.html"
                                           class="btn btn-outline-primary mb-16pt mb-sm-0 mr-sm-16pt">Follow</a>
                                        <a href="teacher-profile.html"
                                           class="btn btn-outline-secondary">View Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
                <!-- // END Page Content -->

                <!-- Footer -->

                <?php require_once "views/templates/footer-nav.php"; ?>

                <!-- // END Footer -->

            </div>

            <!-- // END drawer-layout__content -->

            <!-- Drawer -->
            <?php require_once "views/templates/sidebar.php"; ?>
            <!-- // END Drawer -->
        </div>
        <!-- // END Drawer Layout -->
<?php require_once "views/templates/footer.php"; ?>