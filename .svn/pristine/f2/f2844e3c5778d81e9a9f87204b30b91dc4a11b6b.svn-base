



<?php


$ancestors = array_reverse(get_post_ancestors(get_the_ID()));
if (empty($ancestors)){
    $page_tags=array(
        'child_of'=>get_the_ID(),
        'link_after'=>'',
        'title_li'=>get_the_title(get_the_ID()),
        'depth'=>0,
        'sort_column'  => 'menu_order',
        'hierarchical'=>true,
        'class'=>'',
        'walker'=>new Custom_Walker_Page()

    );
    wp_list_pages_c($page_tags);
}else{
    $parent_id=2;
    if (isset($ancestors[0])){
        $parent_id=$ancestors[0];
    }
    $page_tags=array(
        'child_of'=>$parent_id,
        'link_after'=>'',
        'title_li'=>get_the_title($parent_id),
        'depth'=>0,
        'sort_column'  => 'menu_order',
        'hierarchical'=>true,
        'class'=>'',
        'walker'=>new Custom_Walker_Page()

    );
    wp_list_pages_c($page_tags);
}


?>


<script type="text/javascript">

    $(function(){
        var _nav_title = "";
        var _breadmenu_title = "";
        $('.titlebg h2').each(function (index, element) {
            _breadmenu_title += $(element).text().toLocaleLowerCase() + "|";
        });
        $('.first a').each(function (index, element) {
            _nav_title = $(element).text().toLocaleLowerCase().trim();
            if (_breadmenu_title.indexOf(_nav_title.trim()) >= 0) {
                console.log(_nav_title + '/' + element);
                $(this).css('font-weight', 'bold');
                $(element).parentsUntil('ul.first').each(function (i, e) {
                    if ($(e).children().has(element)) {
                        if ($(e).is('li')) {
                            $(e).addClass('open');
                            $(e).children('span').addClass('open');
                            $(e).children('ul').slideDown(300);
                        } else if ($(e).is('ul')) {
                            $(e).slideDown(300);
                        }
                    }
                });
            }
            else {
                $(".first>li").first().addClass("open");
                $(".first>li").first().css("display", "block");
            }
        });
    });


</script>