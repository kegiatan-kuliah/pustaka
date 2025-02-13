<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard.index') }}">
      <span class="nav-link-title">Beranda</span>
    </a>
  </li>
  @if(Auth::user()->role === 'admin' || Auth::user()->role === 'teacher')
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
        <span class="nav-link-title">
          Buku
        </span>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('book_category.index') }}" rel="noopener">
          Kategori
        </a>
        <a class="dropdown-item" href="{{ route('book_location.index') }}">
          Lokasi
        </a>
        <a class="dropdown-item" href="{{ route('author.index') }}" rel="noopener">
          Pengarang
        </a>
        <a class="dropdown-item" href="{{ route('publisher.index') }}">
          Penerbit
        </a>
        <a class="dropdown-item" href="{{ route('book.index') }}" rel="noopener">
          Katalog
        </a>
      </div>
    </li>
  @endif
  <li class="nav-item">
    <a class="nav-link" href="{{ route('application.index') }}">
      <span class="nav-link-title">Pinjam Buku</span>
    </a>
  </li>
  @if(Auth::user()->role === 'admin')
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
      <span class="nav-link-title">
        Master Data
      </span>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ route('room.index') }}">
        Kelas
      </a>
      <a class="dropdown-item" href="{{ route('member.index') }}">
        Anggota
      </a>
      <a class="dropdown-item" href="{{ route('employee.index') }}">
        Guru
      </a>
    </div>
  </li>
  @endif
</ul>