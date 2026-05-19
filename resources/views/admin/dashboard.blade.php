@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid pt-4">
        <!-- Welcome Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="welcome-card p-5 text-white rounded-xl shadow-lg" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); border-radius: 20px;">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="display-4 font-weight-bold mb-2">Welcome Back, Admin!</h1>
                            <p class="lead opacity-80">Manage your immigration consultancy with ease. Here's what's happening today.</p>
                            <div class="mt-4">
                                <a href="{{ url('/') }}" target="_blank" class="btn btn-light btn-lg px-4 shadow-sm">
                                    <i class="fas fa-external-link-alt mr-2"></i> View Live Site
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 d-none d-md-block text-right">
                            <i class="fas fa-chart-line fa-10x opacity-20"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card p-4 rounded-lg bg-white shadow-sm border-left-info h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">New Inquiries</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $stats['contactus'] ?? 0 }}</div>
                        </div>
                        <div class="icon-circle bg-info-light text-info">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card p-4 rounded-lg bg-white shadow-sm border-left-success h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Services</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $stats['services'] ?? 0 }}</div>
                        </div>
                        <div class="icon-circle bg-success-light text-success">
                            <i class="fas fa-briefcase fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card p-4 rounded-lg bg-white shadow-sm border-left-warning h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Blogs</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $stats['blogs'] ?? 0 }}</div>
                        </div>
                        <div class="icon-circle bg-warning-light text-warning">
                            <i class="fas fa-blog fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card p-4 rounded-lg bg-white shadow-sm border-left-danger h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Carousel Slides</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $stats['carousel'] ?? 0 }}</div>
                        </div>
                        <div class="icon-circle bg-danger-light text-danger">
                            <i class="fas fa-images fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Recent Inquiries Table -->
            <div class="col-xl-8 mb-4">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-header bg-white border-0 py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-paper-plane mr-2"></i> Recent Inquiries</h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="border-0 px-4">Name</th>
                                        <th class="border-0">Email</th>
                                        <th class="border-0">Date</th>
                                        <th class="border-0 text-right px-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentInquiries as $inquiry)
                                    <tr>
                                        <td class="px-4 font-weight-medium text-dark">{{ $inquiry->name }}</td>
                                        <td>{{ $inquiry->email }}</td>
                                        <td>{{ $inquiry->created_at->format('M d, Y') }}</td>
                                        <td class="text-right px-4">
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-pill">View</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">No recent inquiries found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 py-3 text-center">
                        <a href="{{ url('/admin/contacts') }}" class="text-primary font-weight-bold small text-uppercase">View All Inquiries <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-xl-4 mb-4">
                <div class="card shadow-sm border-0 rounded-lg h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-bolt mr-2"></i> Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <a href="{{ url('/admin/services/create') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 border-0 rounded mb-2 bg-light-hover">
                                <div class="bg-primary-light text-primary rounded-circle p-2 mr-3">
                                    <i class="fas fa-plus fa-sm"></i>
                                </div>
                                <div>
                                    <div class="font-weight-bold">Add New Service</div>
                                    <div class="small text-muted">Create a new service offering</div>
                                </div>
                            </a>
                            <a href="{{ url('/admin/blogs/create') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 border-0 rounded mb-2 bg-light-hover">
                                <div class="bg-success-light text-success rounded-circle p-2 mr-3">
                                    <i class="fas fa-edit fa-sm"></i>
                                </div>
                                <div>
                                    <div class="font-weight-bold">Write a Blog Post</div>
                                    <div class="small text-muted">Publish a new article</div>
                                </div>
                            </a>
                            <a href="{{ url('/admin/settings/1/edit') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 border-0 rounded mb-2 bg-light-hover">
                                <div class="bg-warning-light text-warning rounded-circle p-2 mr-3">
                                    <i class="fas fa-cog fa-sm"></i>
                                </div>
                                <div>
                                    <div class="font-weight-bold">Site Settings</div>
                                    <div class="small text-muted">Update contact info & SEO</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        
        body {
            font-family: 'Inter', sans-serif !important;
            background-color: #f8fafc;
        }

        .rounded-xl { border-radius: 1.25rem !important; }
        .rounded-lg { border-radius: 0.75rem !important; }
        
        .stat-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: none;
            border-left: 4px solid;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
        }

        .border-left-info { border-left-color: #0ea5e9 !important; }
        .border-left-success { border-left-color: #22c55e !important; }
        .border-left-warning { border-left-color: #f59e0b !important; }
        .border-left-danger { border-left-color: #ef4444 !important; }

        .icon-circle {
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-info-light { background-color: #e0f2fe; }
        .bg-success-light { background-color: #f0fdf4; }
        .bg-warning-light { background-color: #fef3c7; }
        .bg-danger-light { background-color: #fef2f2; }
        .bg-primary-light { background-color: #eff6ff; }

        .bg-light-hover:hover {
            background-color: #f1f5f9 !important;
        }

        .opacity-80 { opacity: 0.8; }
        .opacity-20 { opacity: 0.2; }

        .font-weight-medium { font-weight: 500; }
        
        .welcome-card {
            overflow: hidden;
            position: relative;
        }

        .welcome-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
        }
    </style>
@stop

@section('js')
    <script> 
        console.log('Premium Dashboard Loaded'); 
    </script>
@stop
