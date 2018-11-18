<nav id="sidebar">
    @can('list-posts')
        <a style="margin-top: 60px; margin-bottom: 10px; font-weight: 600; font-size: 17px; text-transform: uppercase;" class="btn btn-primary btn-block text-left" data-toggle="collapse" href="#collapsePost" role="button" aria-expanded="false" aria-controls="collapsePost">
            Posts 
        </a>
        <div class="collapse" id="collapsePost">
            <a href="{{ route('admin.post.list-posts') }}" class="btn btn-primary btn-block text-left">
                List all
            </a>
            @can('create-posts')
                <a href="{{ route('admin.post.create-post') }}" class="btn btn-primary btn-block text-left">
                    Create
                </a>
            @endcan
        </div>
    @endcan
    @can('list-categories')
        <a style="font-weight: 600; margin-bottom: 10px; font-size: 17px; text-transform: uppercase;" class="btn btn-primary btn-block text-left" data-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false" aria-controls="collapseCategory">
            Categories 
        </a>
        <div class="collapse" id="collapseCategory">
            <a href="{{ route('admin.category.list-categories') }}" class="btn btn-primary btn-block text-left">
                List all
            </a>
            @can('create-categories')
                <a href="{{ route('admin.category.create-category') }}" class="btn btn-primary btn-block text-left">
                    Create
                </a>
            @endcan
        </div>
    @endcan
    @can('list-tags')
        <a style="font-weight: 600; margin-bottom: 10px; font-size: 17px; text-transform: uppercase;" class="btn btn-primary btn-block text-left" data-toggle="collapse" href="#collapseTag" role="button" aria-expanded="false" aria-controls="collapseTag">
            Tags 
        </a>
        <div class="collapse" id="collapseTag">
            <a href="{{ route('admin.tag.list-tags') }}" class="btn btn-primary btn-block text-left">
                List all
            </a>
            @can('create-categories')
                <a href="{{ route('admin.tag.create-tag') }}" class="btn btn-primary btn-block text-left">
                    Create
                </a>
            @endcan
        </div>
    @endcan
    @can('list-users')
        <a style="font-weight: 600; margin-bottom: 10px; font-size: 17px; text-transform: uppercase;" class="btn btn-primary btn-block text-left" data-toggle="collapse" href="#collapseUser" role="button" aria-expanded="false" aria-controls="collapseUser">
            Users 
        </a>
        <div class="collapse" id="collapseUser">
            <a href="{{ route('admin.user.list-users') }}" class="btn btn-primary btn-block text-left">
                List all
            </a>
            @can('create-users')
                <a href="{{ route('admin.user.create-user') }}" class="btn btn-primary btn-block text-left">
                    Create
                </a>
            @endcan
        </div>
    @endcan
    @can('list-roles')
        <a style="font-weight: 600; margin-bottom: 10px; font-size: 17px; text-transform: uppercase;" class="btn btn-primary btn-block text-left" data-toggle="collapse" href="#collapseRole" role="button" aria-expanded="false" aria-controls="collapseRole">
            Roles 
        </a>
        <div class="collapse" id="collapseRole">
            <a href="{{ route('admin.role.list-roles') }}" class="btn btn-primary btn-block text-left">
                List all
            </a>
            @can('create-roles')
                <a href="{{ route('admin.role.create-role') }}" class="btn btn-primary btn-block text-left">
                    Create
                </a>
            @endcan
        </div>
    @endcan
</nav>