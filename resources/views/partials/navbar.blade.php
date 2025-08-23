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
