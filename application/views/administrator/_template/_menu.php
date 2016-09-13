 <!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <?php $menus = $this->config->item('adminstrator.menu'); ?>

      <?php foreach($menus as $menu){ ?>
      
        <?php if($menu['has_header']) { ?>
            <li class="header"><?php echo $menu['header_content']; ?></li>
        <?php } ?>
        
        <?php $menu_informations = $menu['menus']; ?>
        
        <?php foreach($menu_informations as $menu_information){ ?>
            
            <?php if($menu_information['has_sub']) { ?>
                <?php 
                    $activeInSub = false;
                    foreach($menu_information['sub_menus'] as $sub_menu){
                        if(current_url() === $sub_menu['href']){
                          $activeInSub =  true;
                          break;
                        }
                    }
                    
                ?>
                <li class="treeview <?php echo ($activeInSub?'active':''); ?>">
                  <a href="<?php echo $menu_information['href']; ?>">
                    <i class="<?php echo $menu_information['class']; ?>"></i> <span><?php echo $menu_information['content']; ?></span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <?php foreach($menu_information['sub_menus'] as $submenu_information){ ?>
                        <li class="<?php echo  current_url()=== $submenu_information['href']?'active':''; ?>">
                            <a href="<?php echo $submenu_information['href']; ?>">
                                <i class="fa fa-circle-o"></i> <?php echo $submenu_information['content']; ?>
                            </a>
                        </li>
                    <?php } ?>
                  </ul>
                </li>
            
            <?php }else{ ?>
                <li class="<?php echo  current_url()=== $menu_information['href']?'active':''; ?>">
                    <a href="<?php echo $menu_information['href']; ?>">
                        <i class="<?php echo $menu_information['class']; ?>"></i> <span><?php echo $menu_information['content']; ?></span>
                    </a>
                </li>
            <?php } ?>
            
        <?php } ?>
        
      <?php } ?>
    </ul>
</section>
<!-- /.sidebar -->