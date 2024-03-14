<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.includes.head')
   
</head>

<body>
    <main class="main" id="top">
        <div class="container" data-layout="container">
            {{-- Include Sidebar --}}
            @include('backend.includes.sidebar')

            <div class="content">
                {{-- Include Navbar --}}
                @include('backend.includes.navbar')

                {{-- Yield Content Section --}}
                @yield('content')

                {{-- Include Footer --}}
                @include('backend.includes.footer')
            </div>
        </div>
    </main>
</body>

</html>
