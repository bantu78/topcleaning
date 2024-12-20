  
               
const projList = [
    {
        id: "P001",
        index: 0,
        imagelink: "img/proj/p1.jpg",
        nom: "Service de Nettoyage Écologique",
        desc: `
        Créez un service spécialisé qui utilise des produits de nettoyage écologiques, 
        des méthodes durables et des équipements économes en énergie. 
 
    `
    },

]
const projSection = document.getElementById("projSection")

projList.forEach((item, index) => {

    const projItem = `   
               <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="blog-item">
                                <div class="blog-img" style="
                                background:url(${item.imagelink});
                                height:240px; background-size:contain
                                "> 
                                </div>
                                <div class="blog-title">
                                    <h3>${item.nom}</h3>
                                     <a class="btn" href="<?=BASE_URL?>proj/index.php?view=edit&id=<?=$proj['id']?>" ><i class="bx bx-pen bx-xs"></i></a>

                                </div>
                               
                                <div class="blog-text">
                                    <p>${item.desc}</p>
                                </div>
                            </div>

                            

                     `
                     
     projSection.innerHTML += projItem
})