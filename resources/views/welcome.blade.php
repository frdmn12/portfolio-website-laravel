<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>
    <!-- header -->
    <div class="head-landing" id="head">
        <div class="navbar">
            <div class="logo">
                <a href="#head">
                    <p style="font-size: 30px; font-weight: bold">FRDMN12</p>
                </a>
            </div>
            <div class="section">
                <button><a href="#about">About</a></button>
                <button> <a href="#education">Education </a></button>
                <button> <a href="#project">Project </a> </button>
                <button> <a href="#contact">Contact </a> </button>
            </div>
        </div>
        <img src="{{ asset('assets/topographic-line.png') }}" alt="topographic" class="tg-line">
        <div>
            <div class="jumbotron">
                <img src="{{ asset('assets/fotoProfil.png') }}" alt="image.jpg" class="photoProfile" />
                <div class="name">
                    <h1>Hello, Im Bayu <br>Computer Science <br> Student</h1>
                    <button>Contact Me</button>
                </div>
            </div>
        </div>
    </div>


    <div class="aboutMe" id="about">
        <h2>About Me</h2>
        <div class="desc">
            <p>Hello I am Bayu Ferdiman, currently I am still a student majoring in <b>Computer Science at Binus
                    University</b> I
                have a high interest in the world of programming, especially website development. I am quite
                active in several activities outside of college such as volunteering or photographer. I am very happy to
                learn new things quickly adapt that can continue to help improve my skills.</p>
        </div>
        <img src="{{ asset('assets/tl-2.png') }}" alt="" class="tl-2">
    </div>
    <div class="educations" id="education">
        <h2>Education</h2>
        <ul>
            <?php $i = 1; ?>
            @foreach ($data_education as $item)
                <li>
                    <div style="display: flex; align-items: center">
                        <h3><b>{{ $item->nama }} </b></h3>
                        <p id="tahun"> {{ $item->start_date->format('Y') }} - {{ $item->end_date->format('Y') }}</p>
                    </div>
                    <p>{{ $item->jurusan }}</p>
                    <p>{{ strip_tags($item->desc)}}</p>
                </li>
                <?php $i++; ?>
            @endforeach
        </ul>
    </div>


    <img src="{{ asset('assets/tl-3.png') }}" alt="" class="tl-3">
    <div class="project" id="project">
        <h2>Projects</h2>
        <ul>
            <?php $i = 1; ?>
            @foreach ($data_project as $item)
            <li>
                <div class="card" style="width: 25rem;">
                    <img src="{{ asset('images/' . $item->gambar) }}" class="card-img-top" alt="project1">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }} </h5>
                        <p class="card-text">{{ strip_tags($item->desc) }}</p>
                        <a href="{{$item->link}}" class="btn btn-primary">Link</a>
                    </div>
                </div>
            </li>
            <?php $i++; ?>
            @endforeach
        </ul>
    </div>

    <!-- Contacts -->
    <div class="footer" id="contact">
        <div>
            <h2>Connect & Find Me</h2>
        </div>
        <ul>
            <li>
                <a href="">
                    <img src="{{ asset('assets/Linkedin.png') }}" alt="linkedin">
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ asset('assets/Github.png') }}" alt="github">
                </a>
            </li>
            <li>
                <a href="">
                    <img src="{{ asset('assets/Social.png') }}" alt="behance">
                </a>
            </li>
        </ul>
    </div>

</body>

</html>
