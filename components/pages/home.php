<style>
    .cardss{
        background: #fff;
        margin: 1em;
        padding: 1em;
        border-radius: 5px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        box-shadow: 2px 2px 10px #000; 
    }
    .card.carte{
        padding: 1em;
        display: flex;
        align-items: center;
    }
    .text-content{
        display: flex;
        flex-direction: column;
    }
</style>
<div class="cardss">
    <div class="card carte">
        <div class="text-content">
            <span>Membres</span>
            <span><?= $nbrMembres["nombre"] ?></span>
        </div>
        <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-users p-3"></i>
        </svg>
    </div>
    <div class="card carte">
        <span>Taches</span>
        <span><?= $nbrTaches["nombre"] ?></span>
    </div>
    <div class="card carte">
        <span>Tache auccuper</span>
        <span><?= $nbrTacheOccuper["nombre"] ?></span>
    </div>
    <div class="card carte">
        <span>Tache Libre</span>
        <span><?= $nbrTacheLibre["nombre"] ?></span>
    </div>
        <div class="card carte">
        <span>Tache En cours</span>
        <span><?= $nbrTacheEnCours["nombre"] ?></span>
    </div>
        <div class="card carte">
        <span>Tache Fin</span>
        <span><?= $nbrTacheFin["nombre"] ?></span>
    </div>
    
</div>