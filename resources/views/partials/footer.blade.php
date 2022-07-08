<footer class="content-info">
  <div class="container container__footer flex-it f-row f-just-center f-align-center">
    @options('footer_links')    
      @hassub('link')
        @php
             $link = get_sub_field('link');
            if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        @endphp
            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target); ?>" class="<?php if($link_target == "_blank"){ echo "external-link"; }  ?>"><?php echo esc_html( $link_title ); ?></a>
      @php
          endif;
      @endphp
      @endsub
    @endoptions
  </div>
</footer>
