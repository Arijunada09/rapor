<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/dashboard" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
                </li>
                @if(auth()->user()->level == 'admin')
                <li><a href="/sekolah" class=""><i class="lnr lnr-home"></i> <span>Sekolah</span></a>
                </li>
                <li><a href="{{ route('kelas.index') }}" class=""><i class="lnr lnr-list"></i> <span>Kelas</span></a>
                </li>
                <li><a href="{{ route('mapel.index') }}" class=""><i class="lnr lnr-list"></i> <span>Mata
                            Pelajaran</span></a>
                </li>
                <li><a href="{{ route('guru.index') }}" class=""><i class="lnr lnr-users"></i> <span>Guru</span></a>
                </li>
                <li><a href="{{ route('siswa.index') }}" class=""><i class="lnr lnr-user"></i> <span>Siswa</span></a>
                </li>

                <li><a href="/posts" class=""><i class="lnr lnr-user"></i> <span>Posts</span></a></li>
                @endif

                @if (auth()->user()->level == 'wali kelas')
                <li><a href="/dashboard" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
                </li>
                <li><a href="/module" class=""><i class="lnr lnr-file-empty"></i> <span>Data Penilaian</span></a>
                </li>
                @endif

                @if (auth()->user()->level == 'guru mapel')
                <li><a href="/dashboard" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
                </li>
                <li><a href="/module" class=""><i class="lnr lnr-file-empty"></i> <span>Data Penilaian</span></a>
                </li>
                @endif
                <li><a href="/" class=""><i class=""></i> <span>Logout</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>