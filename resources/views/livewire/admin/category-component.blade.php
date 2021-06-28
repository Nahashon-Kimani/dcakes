@section('title', 'CATEGORY')

<main id="content" class="page-main container">
    <!-- Block Spotlight1  -->
    <div class="so-spotlight1 ">
        <div class="container">
            @if (Session::has('message'))
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i>
                {{ Session::get('message') }}
            </div>
            @endif
           <div class="panel">
               <div class="panel-header">
                    <div class="col-sm-6">
                        <h3 class="card-title text-uppercase">All Categories</h3>
                    </div>
                    <div class="col-sm-6">
                    <a href="{{ route('admin.addcategory') }}" class="btn btn-warning pull-right px-5 m-5"> 
                        <i class="fa fa-plus"></i> New Categories
                    </a>
                    </div>
               </div>
               <div class="panel-body">
                     <div class="row">
                         <table class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <td class="text-left">#</td>
                                     <td class="text-left">Name</td>
                                     <td class="text-left">Slug</td>
                                     <td class="text-left">Created By</td>
                                     <td class="text-left" colspan="2">Action</td>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($categories as $key=>$cat)
                                     <tr>
                                         <td>{{ $key + 1 }}</td>
                                         <td>{{ $cat->name }}</td>
                                         <td>{{ $cat->slug }}</td>
                                         <td>{{ $cat->users->name }}</td>
                                         <td>
                                             <a href="{{ route('admin.editcategory', $cat->slug) }}"
                                              class="btn btn-warning bt-sm">
                                                <i class="fa fa-edit"></i>
                                             </a>
                                         </td>
                                         <td>
                                             <a href="#" onclick="confirm('Are you sure you want to delete this category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{ $cat->id }})"
                                                class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                             </a>
                                         </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                         {{ $categories->links() }}
                     </div>
               </div>
           </div>
        </div>
    </div>
</main>
