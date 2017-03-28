    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
  
<?php if (isset($menus) && is_array($menus)) : ?>
<?php foreach ($menus as $menu) : ?>
<?php   if (array_get($menu, 'url', '') == '') : ?>
                        <li class="<?php echo Request::is('/') ? 'active' : '';?>">
                            <a href="{{ env('APP_URL') }}/<?php echo array_get($menu, 'url', ''); ?>">
                                <?php echo array_get($menu, 'title', ''); ?>
                            </a>
                        </li>
<?php   else : ?>
                        <li class="<?php echo Request::is(array_get($menu, 'url', '')) ? 'active' : '';?>">
                            <a href="{{ env('APP_URL') }}/<?php echo array_get($menu, 'url', ''); ?>">
                                <?php echo array_get($menu, 'title', ''); ?>
                            </a>
                        </li>
<?php   endif; ?>
<?php endforeach; ?>
<?php endif; ?>

                    </ul>
                </div>  
            </div>
        </div>
    </div> 