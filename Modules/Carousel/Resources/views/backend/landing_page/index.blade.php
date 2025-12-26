@extends('backend.layouts.app')

@section('title') {{ $module_title }} @endsection

@section('content')
<div class="card">
    <div class="card-body">
         <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ $module_title }}
        </x-backend.section-header>

        <form action="{{ route('backend.landing_page.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
             <div class="row mt-4">
                <div class="col-12 col-md-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active text-start" id="v-pills-hero-tab" data-coreui-toggle="pill" data-coreui-target="#v-pills-hero" type="button" role="tab" aria-controls="v-pills-hero" aria-selected="true"><i class="fa-solid fa-images me-2"></i> Hero Section</button>
                        <button class="nav-link text-start" id="v-pills-welcome-tab" data-coreui-toggle="pill" data-coreui-target="#v-pills-welcome" type="button" role="tab" aria-controls="v-pills-welcome" aria-selected="false"><i class="fa-solid fa-user-tie me-2"></i> Sambutan Kades</button>
                         <button class="nav-link text-start" id="v-pills-info-tab" data-coreui-toggle="pill" data-coreui-target="#v-pills-info" type="button" role="tab" aria-controls="v-pills-info" aria-selected="false"><i class="fa-solid fa-chart-pie me-2"></i> Statistics & Video</button>
                        <button class="nav-link text-start" id="v-pills-services-tab" data-coreui-toggle="pill" data-coreui-target="#v-pills-services" type="button" role="tab" aria-controls="v-pills-services" aria-selected="false"><i class="fa-solid fa-hands-holding-circle me-2"></i> Services</button>
                        <button class="nav-link text-start" id="v-pills-contact-tab" data-coreui-toggle="pill" data-coreui-target="#v-pills-contact" type="button" role="tab" aria-controls="v-pills-contact" aria-selected="false"><i class="fa-solid fa-address-book me-2"></i> Contact & Footer</button>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- Hero Tab -->
                        <div class="tab-pane fade show active" id="v-pills-hero" role="tabpanel" aria-labelledby="v-pills-hero-tab" tabindex="0">
                             <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i> To manage the sliding images (Carousel), please visit the <a href="{{ route('backend.carousels.index') }}" class="fw-bold text-decoration-underline">Carousel Manager</a>.
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hero Title</label>
                                <input type="text" name="landing_hero_title" class="form-control" value="{{ $settings['landing_hero_title'] ?? '' }}" placeholder="Welcome to Desa Dukuhlor">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hero Subtitle</label>
                                <textarea name="landing_hero_subtitle" class="form-control" rows="3" placeholder="A brief description appearing below the title">{{ $settings['landing_hero_subtitle'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Call to Action Text</label>
                                <input type="text" name="landing_hero_cta_text" class="form-control" value="{{ $settings['landing_hero_cta_text'] ?? 'Explore Services' }}">
                            </div>
                             <div class="mb-3">
                                <label class="form-label">Call to Action Link</label>
                                <input type="text" name="landing_hero_cta_link" class="form-control" value="{{ $settings['landing_hero_cta_link'] ?? '#services' }}">
                            </div>
                        </div>

                        <!-- Welcome Tab -->
                        <div class="tab-pane fade" id="v-pills-welcome" role="tabpanel" aria-labelledby="v-pills-welcome-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="form-label">Judul Sambutan</label>
                                <input type="text" name="landing_welcome_title" class="form-control" value="{{ $settings['landing_welcome_title'] ?? 'Sambutan Kepala Desa' }}">
                            </div>
                             <div class="mb-3">
                                <label class="form-label">Isi Sambutan</label>
                                <textarea name="landing_welcome_body" class="form-control" rows="8">{{ $settings['landing_welcome_body'] ?? '' }}</textarea>
                            </div>
                             <div class="mb-3">
                                <label class="form-label">Foto Kades / Sambutan</label>
                                @if(isset($settings['landing_welcome_image']))
                                    <div class="mb-2">
                                        <img src="{{ asset($settings['landing_welcome_image']) }}" class="img-thumbnail" style="max-height: 150px">
                                    </div>
                                @endif
                                <div class="input-group">
                                    <input type="file" name="landing_welcome_image" class="form-control" id="inputWelcomeImage">
                                    <label class="input-group-text" for="inputWelcomeImage">Upload</label>
                                </div>
                            </div>
                        </div>
                        
                         <!-- Info / Stats Tab -->
                         <div class="tab-pane fade" id="v-pills-info" role="tabpanel" aria-labelledby="v-pills-info-tab" tabindex="0">
                            <h5 class="custom-heading mb-3"><i class="fa-solid fa-video me-2"></i>Video Profil</h5>
                            <div class="mb-3">
                                <label class="form-label">Video Profil URL (Youtube)</label>
                                <input type="url" name="landing_video_url" class="form-control" value="{{ $settings['landing_video_url'] ?? '' }}" placeholder="https://youtube.com/watch?v=...">
                                <div class="form-text">Paste the full Youtube URL.</div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <h5 class="custom-heading mb-3"><i class="fa-solid fa-chart-line me-2"></i>Statistik Desa</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Total Penduduk</label>
                                    <input type="number" name="landing_stats_population" class="form-control" value="{{ $settings['landing_stats_population'] ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Total Kepala Keluarga</label>
                                    <input type="number" name="landing_stats_families" class="form-control" value="{{ $settings['landing_stats_families'] ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Luas Wilayah (Ha)</label>
                                    <input type="number" step="0.01" name="landing_stats_area" class="form-control" value="{{ $settings['landing_stats_area'] ?? '' }}">
                                </div>
                            </div>
                         </div>

                         <!-- Services Tab -->
                         <div class="tab-pane fade" id="v-pills-services" role="tabpanel" aria-labelledby="v-pills-services-tab" tabindex="0">
                            <div class="alert alert-light border">
                                <i class="fas fa-info-circle me-1"></i> You can display up to 3 highlighted services. Use FontAwesome classes for icons (e.g., <code>fa-solid fa-file-signature</code>).
                            </div>
                            
                            @for($i = 1; $i <= 3; $i++)
                            <div class="card mb-3 border-secondary">
                                <div class="card-header bg-secondary text-white">Service #{{ $i }}</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Service Name</label>
                                            <input type="text" name="landing_service_{{ $i }}_title" class="form-control" value="{{ $settings['landing_service_'.$i.'_title'] ?? '' }}" placeholder="e.g. Administrasi Kependudukan">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Icon Class (FontAwesome)</label>
                                            <input type="text" name="landing_service_{{ $i }}_icon" class="form-control" value="{{ $settings['landing_service_'.$i.'_icon'] ?? '' }}" placeholder="fa-solid fa-file">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Short Description</label>
                                            <textarea name="landing_service_{{ $i }}_desc" class="form-control" rows="2">{{ $settings['landing_service_'.$i.'_desc'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                         </div>

                         <!-- Contact Tab -->
                         <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="form-label">Alamat Kantor Desa</label>
                                <textarea name="landing_address" class="form-control" rows="2">{{ $settings['landing_address'] ?? '' }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email Resmi</label>
                                    <input type="email" name="landing_email" class="form-control" value="{{ $settings['landing_email'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nomor Telepon / WhatsApp</label>
                                    <input type="text" name="landing_phone" class="form-control" value="{{ $settings['landing_phone'] ?? '' }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Google Maps Embed URL</label>
                                <textarea name="landing_maps_embed" class="form-control" rows="3" placeholder='<iframe src="https://www.google.com/maps/embed...'>{{ $settings['landing_maps_embed'] ?? '' }}</textarea>
                                <div class="form-text">Paste the HTML Embed code from Google Maps.</div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Save Settings</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-undo me-1"></i> Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
