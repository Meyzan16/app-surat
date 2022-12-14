<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                @if(auth()->user()->roles == 'OPERATOR_PRODI')
                    <li class="sidebar-item {{ request()->is('operator') ? 'active' : '' }} ">
                        <a href="{{ route('operator.dashboard')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @elseif(auth()->user()->roles == 'KEPALA_OPERATOR')
                    <li class="sidebar-item {{ request()->is('kepala-operator') ? 'active' : '' }} ">
                        <a href="{{ route('kepala-operator.dashboard')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @elseif(auth()->user()->roles == 'VERIF_PERSETUJUAN')
                    <li class="sidebar-item {{ request()->is('pemegang-tanggung-jawab') ? 'active' : '' }} ">
                        <a href="{{ route('ttd-persetujuan.dashboard')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->roles == 'OPERATOR_PRODI')
                    <li class="sidebar-item  {{ request()->is('operator/surat-mahasiswa/surat-aktif-kuliah*') ? 'active' : '' }}  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack "></i>
                            <span>Surat Aktif Kuliah</span>
                        </a>
                        <ul class="submenu {{ request()->is('operator/surat-mahasiswa/surat-aktif-kuliah*') ? 'active' : '' }}">
                            <li class="submenu-item  {{ request()->is('operator/surat-mahasiswa/surat-aktif-kuliah*') ? 'active' : '' }} ">
                                <a href="{{ route('operator.surat-aktif-kuliah.index')}}">Data pengajuan</a>
                            </li>
                            <li class="submenu-item {{ request()->is('operator/surat-mahasiswa/aktif-kuliah/history-pengajuan') ? 'active' : '' }}">
                                <a href="{{route('surat-masih-kuliah.history')}}">History Surat</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack "></i>
                            <span>Surat Keterangan Lulus</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('operator.surat-aktif-kuliah.index')}}">Data pengajuan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-badge.html">History Surat</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  {{ request()->is('operator/surat-mahasiswa/surat-umum*') ? 'active' : '' }}  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack "></i>
                            <span>Surat Mahasiswa</span>
                        </a>
                        <ul class="submenu {{ request()->is('operator/surat-mahasiswa/surat-umum*') ? 'active' : '' }}">
                            <li class="submenu-item  {{ request()->is('operator/surat-mahasiswa/surat-umum*') ? 'active' : '' }} ">
                                <a href="{{ route('operator.surat-umum-mhs.index')}}">Data pengajuan</a>
                            </li>
                            <li class="submenu-item {{ request()->is('operator/surat-mahasiswa/surat-umum/history') ? 'active' : '' }}">
                                <a href="{{route('operator.surat-umum-mhs.history')}}">History Surat</a>
                            </li>
                        </ul>
                    </li>



                    <li class="sidebar-item {{ request()->is('operator/surat-prodi*') ? 'active' : '' }}  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Surat Umum </span>
                        </a>
                        <ul class="submenu {{ request()->is('operator/surat-prodi*') ? 'active' : '' }}">
                            <li class="submenu-item {{ request()->is('operator/surat-prodi*') ? 'active' : '' }}">
                                <a href="{{route('operator.surat-umum.index')}}">Data Surat</a>
                            </li>
                        </ul>
                    </li>
                @elseif(auth()->user()->roles == 'KEPALA_OPERATOR')
                    <li class="sidebar-item {{ request()->is('kepala-operator/surat-mahasiswa/surat-aktif-kuliah*') ? 'active' : '' }}  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Surat Aktif Kuliah</span>
                        </a>
                        <ul class="submenu {{ request()->is('kepala-operator/surat-mahasiswa/surat-aktif-kuliah*') ? 'active' : '' }}">

                            @php
                                $prodi = DB::table('tb_prodis')->get();
                            @endphp

                            @foreach($prodi as $item)
                            <li class="submenu-item">
                                <a href="{{ route('kepala-operator.surat-aktif-kuliah.index', $item->kode_prodi) }}">{{ $item->nama_prodi}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    

                    <li class="sidebar-item {{ request()->is('kepala-operator/surat-mahasiswa/surat-umum-mahasiswa*') ? 'active' : '' }}  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Surat Mahasiswa</span>
                        </a>
                        <ul class="submenu {{ request()->is('kepala-operator/surat-mahasiswa/surat-umum-mahasiswa*') ? 'active' : '' }}">

                            @php
                                $prodi = DB::table('tb_prodis')->get();
                            @endphp

                            @foreach($prodi as $item)
                            <li class="submenu-item">
                                <a href="{{ route('kep-operator.surat-umum-mhs.index', $item->kode_prodi) }}">{{ $item->nama_prodi}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="sidebar-item {{ request()->is('kepala-operator/surat-umum-prodi*') ? 'active' : '' }}  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Surat Umum Prodi</span>
                        </a>
                        <ul class="submenu {{ request()->is('kepala-operator/surat-umum-prodi*') ? 'active' : '' }}">

                            @php
                                $prodi = DB::table('tb_prodis')->get();
                            @endphp

                            @foreach($prodi as $item)
                            <li class="submenu-item">
                                <a href="{{ route('kep-operator.surat-umum.index', $item->kode_prodi) }}">{{ $item->nama_prodi}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>



                    <li class="sidebar-item  {{ request()->is('kepala-operator/pengaturan*') ? 'active' : '' }} has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-badge-fill"></i>
                            <span>Pengaturan Surat</span>
                        </a>
                        <ul class="submenu {{ request()->is('kepala-operator/pengaturan*') ? 'active' : '' }}">
                            <li class="submenu-item  {{ request()->is('kepala-operator/pengaturan/judul-surat*') ? 'active' : '' }}">
                                <a href="{{route('judul-surat.index')}}">Judul Surat</a>
                            </li>
                            <li class="submenu-item {{ request()->is('kepala-operator/pengaturan/data-lampiran*') ? 'active' : '' }}">
                                <a href="{{ route('data-lampiran.index') }}">Lampiran Surat</a>
                            </li>
                            <li class="submenu-item {{ request()->is('kepala-operator/pengaturan/data-tujuan*') ? 'active' : '' }}">
                                <a href="{{ route('data-tujuan.index') }}">Tujuan Surat</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-badge-fill"></i>
                            <span>Akun</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('akun-prodi.index')}}">Akun Prodi</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('akun-operator.index')}}">Akun Operator</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('akun-persetujuan.index')}}">Akun Persetujuan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('akun-kep-operator.index')}}">Profile</a>
                            </li>
                        
                        </ul>
                    </li>
                @elseif(auth()->user()->roles == 'VERIF_PERSETUJUAN')
                    <li class="sidebar-item {{ request()->is('pemegang-tanggung-jawab/surat-mahasiswa/surat-aktif-kuliah*') ? 'active' : '' }} has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack "></i>
                            <span>Surat aktif kuliah</span>
                        </a>
                        <ul class="submenu {{ request()->is('pemegang-tanggung-jawab/surat-mahasiswa/surat-aktif-kuliah*') ? 'active' : '' }}">

                            @php
                                $prodi = DB::table('tb_prodis')->get();
                            @endphp

                            @foreach($prodi as $item)
                            <li class="submenu-item">
                                <a href="{{ route('ttd-persetujuan.surat-aktif-kuliah.index', $item->kode_prodi) }}">{{ $item->nama_prodi}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    

                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack "></i>
                            <span>Surat Keterangan Lulus</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="">Data pengajuan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="">History Surat</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item {{ request()->is('pemegang-tanggung-jawab/surat-mahasiswa/surat-umum-mahasiswa*') ? 'active' : '' }}  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Surat Mahasiswaa</span>
                        </a>
                        <ul class="submenu {{ request()->is('pemegang-tanggung-jawab/surat-mahasiswa/surat-umum-mahasiswa*') ? 'active' : '' }}">

                            @php
                                $prodi = DB::table('tb_prodis')->get();
                            @endphp

                            @foreach($prodi as $item)
                            <li class="submenu-item">
                                <a href="{{ route('ttd-persetujuan.surat-umum-mhs.index', $item->kode_prodi) }}">{{ $item->nama_prodi}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>


                    <li class="sidebar-item {{ request()->is('pemegang-tanggung-jawab/surat-umum*') ? 'active' : '' }}  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Surat Umum Prodi</span>
                        </a>
                        <ul class="submenu {{ request()->is('pemegang-tanggung-jawab/surat-umum*') ? 'active' : '' }}">

                            @php
                                $prodi = DB::table('tb_prodis')->get();
                            @endphp

                            @foreach($prodi as $item)
                            <li class="submenu-item">
                                <a href="{{ route('ttd-persetujuan.surat-umum.index', $item->kode_prodi) }}">{{ $item->nama_prodi}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="sidebar-item {{ request()->is('pemegang-tanggung-jawab/profile*') ? 'active' : '' }}">
                        <a href="{{route('persetujaun.profile.index')}}" class='sidebar-link {{ request()->is('pemegang-tanggung-jawab/profile*') ? 'active' : '' }}'>
                            <i class="bi bi-person-badge-fill"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                @elseif(auth()->user()->roles == 'VERIF_PRODI')
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Surat Aktif Kuliah verif</span>
                        </a>
                        <ul class="submenu ">

                            @php
                                $prodi = DB::table('tb_prodis')->get();
                            @endphp

                            @foreach($prodi as $item)
                            <li class="submenu-item ">
                                <a href="{{ route('prodi-pengajuan.surat-aktif-kuliah.index', $item->kode_prodi) }}">{{ $item->nama_prodi}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="sidebar-item {{ request()->is('kepala-operator/surat-umum-mahasiswa*') ? 'active' : '' }}  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Surat Mahasiswa</span>
                        </a>
                        <ul class="submenu {{ request()->is('kepala-operator/surat-umum-mahasiswa*') ? 'active' : '' }}">

                            @php
                                $prodi = DB::table('tb_prodis')->get();
                            @endphp

                            @foreach($prodi as $item)
                            <li class="submenu-item">
                                <a href="{{ route('kep-operator.surat-umum-mhs.index', $item->kode_prodi) }}">{{ $item->nama_prodi}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                @endif




                

               

            
               
{{-- 
                <li class="sidebar-item  ">
                    <a href="table.html" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Table</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="table-datatable.html" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Datatable</span>
                    </a>
                </li>

                <li class="sidebar-title">Extra UI</li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-pentagon-fill"></i>
                        <span>Widgets</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="ui-widgets-chatbox.html">Chatbox</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-widgets-pricing.html">Pricing</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-widgets-todolist.html">To-do List</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-egg-fill"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="ui-icons-bootstrap-icons.html">Bootstrap Icons </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-icons-fontawesome.html">Fontawesome</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-icons-dripicons.html">Dripicons</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="ui-chart-chartjs.html">ChartJS</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-chart-apexcharts.html">Apexcharts</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  ">
                    <a href="ui-file-uploader.html" class='sidebar-link'>
                        <i class="bi bi-cloud-arrow-up-fill"></i>
                        <span>File Uploader</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-map-fill"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="ui-map-google-map.html">Google Map</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="ui-map-jsvectormap.html">JS Vector Map</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Pages</li>

                <li class="sidebar-item  ">
                    <a href="application-email.html" class='sidebar-link'>
                        <i class="bi bi-envelope-fill"></i>
                        <span>Email Application</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="application-chat.html" class='sidebar-link'>
                        <i class="bi bi-chat-dots-fill"></i>
                        <span>Chat Application</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="application-gallery.html" class='sidebar-link'>
                        <i class="bi bi-image-fill"></i>
                        <span>Photo Gallery</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="application-checkout.html" class='sidebar-link'>
                        <i class="bi bi-basket-fill"></i>
                        <span>Checkout Page</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="auth-login.html">Login</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="auth-register.html">Register</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="auth-forgot-password.html">Forgot Password</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-x-octagon-fill"></i>
                        <span>Errors</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="error-403.html">403</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="error-404.html">404</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="error-500.html">500</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Raise Support</li>

                <li class="sidebar-item  ">
                    <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
                        <i class="bi bi-life-preserver"></i>
                        <span>Documentation</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                        <i class="bi bi-puzzle"></i>
                        <span>Contribute</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer#donate" class='sidebar-link'>
                        <i class="bi bi-cash"></i>
                        <span>Donate</span>
                    </a>
                </li> --}}

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>