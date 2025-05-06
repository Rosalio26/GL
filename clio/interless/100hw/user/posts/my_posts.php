

<div class="my-col-post">
    <div class="cnt_new_post">
        <a class="lk_btn_nw" href="./pass_conf.php?confPages=new_post">New</a>
    </div>

    <nav class="nav-post cnt-post-itm">
        <ul class="cnt-itm-post">
            <li class="cnt-link-post-btn-et"><a class="link-post-btn-et" href="index.php?indexConfiguration=profile&confProfilePages=my_post&postPagesContent=allPosts">Todos</a></li>
            <li class="cnt-link-post-btn-et"><a class="link-post-btn-et" href="index.php?indexConfiguration=profile&confProfilePages=my_post&postPagesContent=contentPosts">Conteúdos</a></li>
            <li class="cnt-link-post-btn-et"><a class="link-post-btn-et" href="index.php?indexConfiguration=profile&confProfilePages=my_post&postPagesContent=videoPosts">Videos</a></li>
            <li class="cnt-link-post-btn-et"><a class="link-post-btn-et" href="index.php?indexConfiguration=profile&confProfilePages=my_post&postPagesContent=musicPosts">Musicas</a></li>
            <li class="cnt-link-post-btn-et"><a class="link-post-btn-et" href="index.php?indexConfiguration=profile&confProfilePages=my_post&postPagesContent=photoPosts">Fotos</a></li>
        </ul>
    </nav>
    <h2 class="tlt-post">Meus Posts</h2>

    <div>
        <?php

            switch (@$_REQUEST["postPagesContent"]) {
                case 'allPosts':
                    include('user/posts/allposts.php');
                    break;
                case 'contentPosts':
                    include('user/posts/files_post/contentposts.php');
                    break;

                case 'videoPosts':
                    include('user/posts/files_post/videoposts.php');
                    break;

                case 'musicPosts':
                    include('user/posts/files_post/musicposts.php');
                    break;

                case 'photoPosts':
                    include('user/posts/files_post/photoposts.php');
                    break;

                default:
                    include('user/posts/allposts.php');
                    break;
            }
        ?>
    </div>
</div>