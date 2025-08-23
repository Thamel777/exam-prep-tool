{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Save My Exam') }} - Home</title>

  {{-- Main CSS (placed in public/css/style.css) --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <!-- Top Header -->
  <div class="top-bar">
    <div class="wrapper">
      <span class="phone">📞 +94 777898782</span>
      <span class="email">📧 savemyexam.ba5@gmail.com</span>
    </div>
  </div>

  <!-- Navbar -->
  <header class="navbar">
    <div class="wrapper">
      <div class="logo">Save My Exam</div>

      <nav class="nav-right">
        <ul>
          <li><a href="{{ url('/') }}">Home</a></li>

          <li class="dropdown">
            <a href="#">Past Papers</a>
            <ul class="dropdown-content">
              <li><a href="#">Topical Questions</a></li>
              <li><strong>Yearly Past Papers</strong></li>
              <li><a href="{{ url('/ol-papers') }}">O/L Papers</a></li>
              <li><a href="{{ url('/al-papers') }}">A/L Papers</a></li>
              <li><strong>MCQ Quiz</strong></li>
              <li><a href="{{ url('/ol-quiz') }}">O/L Quiz</a></li>
              <li><a href="{{ url('/al-quiz') }}">A/L Quiz</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#">Exams 2025</a>
            <ul class="dropdown-content">
              <li><a href="{{ url('/exam-timetable') }}">Exam Timetable</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#">About Us</a>
            <ul class="dropdown-content">
              <li><a href="{{ url('/lecturer-panel') }}">Lecturer Panel</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#">Other</a>
            <ul class="dropdown-content">
              <li><a href="{{ url('/checklist') }}">Check List</a></li>
              <li><a href="{{ url('/timeline') }}">Timeline</a></li>
            </ul>
          </li>

          {{-- Auth-aware items --}}
          @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
          @endguest

          @auth
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li>
              <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="link-like">Logout</button>
              </form>
            </li>
          @endauth
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <section class="hero">
      <h2>Welcome to Save My Exam</h2>
      <p>Find your O/L and A/L past papers, timetables, and exam resources – all in one place.</p>
      <div class="buttons">
        <a href="{{ url('/ol-papers') }}" class="btn">Browse O/L Papers</a>
        <a href="{{ url('/al-papers') }}" class="btn">Browse A/L Papers</a>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer>
    <div class="footer-column">
      <h3>PlatinumAcademy.lk</h3>
      <p>Offers O/L and A/L courses delivered to a consistently high standard by knowledgeable instructors passionate about teaching.</p>
    </div>
    <div class="footer-column">
      <h4>Featured Links</h4>
      <ul>
        <li>Payment</li>
        <li>Admissions</li>
        <li>Courses</li>
        <li>FAQs</li>
        <li>About Us</li>
      </ul>
    </div>
    <div class="footer-column">
      <h4>Information</h4>
      <p>📍 106, S.D.S Jayasinghe Mawatha,<br>Kohuwala, Nugegoda,<br>337/A, Negombo Road, Wattala.</p>
      <p>📞 +94 777889678<br>📞 +94 777497678</p>
      <p>📧 inquiries@platinumacademy.lk</p>
    </div>
  </footer>

</body>
</html>
