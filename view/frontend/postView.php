<?php
$title = htmlspecialchars($post->title());
$description = 'Blog';
ob_start();
?>

<div class="row">
  <div class="col-md-12">
    <a href="#">
      <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
    </a>
      </div>
        <div class="col-md-12">
          <p>"<?=htmlspecialchars($post->chapo())?>"</p>
            <h4>Contenu :</h4>
            <p><?=$post->content()?></p>
            Date de creation : <?=htmlspecialchars($post->creation_date())?></br>
            Date de modification : <?=htmlspecialchars($post->update_date())?></br>
            Auteur : <?=htmlspecialchars($post->username())?></br>
        </div>

        <?php
         if(isset($_SESSION['user'])) {

            if(strpos($_SESSION['user'] -> perm_action(), 'editPost') !== false) {
        ?>
              <p><a class="btn btn-primary" href='?action=editPostView&id=<?=htmlspecialchars($post->id_post())?>'>Modifier l'article</a></p>
              <p><a class="btn btn-danger" href='?action=deletePost&id=<?=htmlspecialchars($post->id_post())?>'onclick="return confirm('Etes-vous sûr ?');">Supprimer l'article</a></p>
        <?php
          }
        }
        ?>

        <a href="index.php">Retour à la liste des billets</a>
    </div>
    <hr>

<?php
$content = ob_get_clean();
include __DIR__ . "/../template.php";
?>
