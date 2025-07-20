 <div class="tp-postbox-meta">
     <span><img src="<?php echo get_avatar(get_the_author_meta('ID')); ?>"><?php the_author(); ?></span>
     <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
             <path
                 d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15Z"
                 stroke="#828282" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
             <path d="M8 3.80005V8.00005L10.8 9.40005" stroke="#828282" stroke-width="1.5" stroke-linecap="round"
                 stroke-linejoin="round" />
         </svg>                <?php echo get_the_date(); ?></span>
 </div>