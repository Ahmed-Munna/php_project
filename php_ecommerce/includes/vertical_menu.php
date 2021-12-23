                    <div class="vertical-menu vertical-category-block">
                            <div class="block-title">
                                <span class="menu-icon">
                                    <span class="line-1"></span>
                                    <span class="line-2"></span>
                                    <span class="line-3"></span>
                                </span>
                                <span class="menu-title">All departments</span>
                                <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>
                            <div class="wrap-menu">
                                <ul class="menu clone-main-menu">
                                <?php
                                    foreach($ctg_datas as $ctg_data){
                                        if($ctg_data["ctg_status"]==1){
                                ?>
                                    <li class="menu-item menu-item-has-children has-megamenu">
                                        <a href="category.php?catView=<?= $ctg_data["ctg_name"]?>" class="menu-name" data-title="<?= $ctg_data["ctg_name"]?>"><?= $ctg_data ["ctg_name"]?></a>
                                    </li>
                                    <?php }}?>
                                </ul>
                            </div>
                        </div>