<?php if (isset($pagination) && !empty($pagination)) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-right">
                      แสดง
                      <?php echo array_get($pagination, 'display.first', 0);?>
                      -
                      <?php echo array_get($pagination, 'display.last', 0);?>
                      จากทั้งหมด
                      <?php echo array_get($pagination, 'display.total', 0);?>
                    </div>
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">

<?php if (isset($pagination['firstPage']) && !empty($pagination['firstPage'])): ?>
                            <li class="<?php echo (array_get($pagination, 'firstPage.active', '') == 0 ? 'disabled' : ''); ?>">
<?php     if (array_get($pagination, 'firstPage.active', '') == 0) : ?>
                              <span aria-hidden="true">&laquo;</span>
<?php     else: ?>
                              <a href="<?php echo array_get($pagination, 'firstPage.url', '');?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
<?php     endif; ?>
                            </li>
<?php   endif; ?>

<?php if (isset($pagination['midPage']) && !empty($pagination['midPage'])): ?>
<?php   foreach (array_get($pagination, 'midPage', []) as $key => $midPage) : ?>
                            <li class="<?php echo (array_get($midPage, 'active', '') == 1 ? 'active' : ''); ?>">
                                <a href="<?php echo array_get($midPage, 'url', '');?>"><?php echo $key; ?></a>
                            </li>
<?php   endforeach; ?>
<?php endif; ?>

<?php if (isset($pagination['lastPage']) && !empty($pagination['lastPage'])): ?>
                            <li class="<?php echo (array_get($pagination, 'lastPage.active', '') == 0 ? 'disabled' : ''); ?>">
<?php     if (array_get($pagination, 'lastPage.active', '') == 0) : ?>
                              <span aria-hidden="true">&raquo;</span>
<?php     else: ?>
                              <a href="<?php echo array_get($pagination, 'lastPage.url', '');?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
<?php     endif; ?>
                            </li>
<?php endif; ?>

                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
<?php endif; ?>