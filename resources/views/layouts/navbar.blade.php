<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="./">
      <span class="nav-link-title">Beranda</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('author.index') }}">
      <span class="nav-link-title">Pengarang</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('publisher.index') }}">
      <span class="nav-link-title">Penerbit</span>
    </a>
  </li>
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
      <a class="dropdown-item" href="{{ route('book.index') }}" rel="noopener">
        Katalog
      </a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('member.index') }}">
      <span class="nav-link-title">Anggota</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('user.index') }}">
      <span class="nav-link-title">Guru</span>
    </a>
  </li>
</ul>