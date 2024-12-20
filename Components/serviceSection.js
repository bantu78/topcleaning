

const serviceList = [
    {
        id: "S001",
        index: 0,
        imagelink: "img/service/s1.jpg",
        nom: "Nettoyage de bureaux",
        desc: `
        Entretien régulier des espaces de travail, incluant le nettoyage des surfaces, des sols, et des équipements
    `
    },
    {
        id: "S002",
        index: 1,
        imagelink: "img/service/s2.jpg",
        nom: "Nettoyage de vitres",
        desc: `
        Intérieur et extérieur des fenêtres 
     `
    },

      {
        id: "S003",
        index: 2,
        imagelink: "img/service/s3.jpeg",
        nom: "Moquettes et tapis",
        desc: `
    Nettoyage en profondeur des moquettes et tapis, y compris le shampoing et l'extraction des taches
     `
    },
    {
        id: "S004",
        index: 3,
        imagelink: "img/service/s4.jpg",
        nom: "Nettoyage Écologique",
        desc: `
        Créez un service spécialisé qui utilise des produits de nettoyage écologiques, 
        des méthodes durables et des équipements économes en énergie. 
 
    `
    },
    {
        id: "S005",
        index: 4,
        imagelink: "img/service/s5.jpeg",
        nom: "Bâtiments commerciaux",
        desc: `
       Entretien de grands espaces commerciaux, tels que des magasins, des centres commerciaux et des restaurants
    `
    },

    {
        id: "S006",
        index: 5,
        imagelink: "img/service/s6.jpg",
        nom: "Nettoyage de logements",
        desc: `
      Services de nettoyage pour les maisons et appartements, incluant le nettoyage des cuisines, salles de bains et chambres
    `
    },



]
const serviceSection = document.getElementById("serviceSection")

serviceList.forEach((item, index) => {

    const serviceItem = `    
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item" style="
                               box-shadow: rgb(50 156 208) 0px 0px 0px 3px,
                                rgb(3 15 39) 0px 0px 0px 6px; 
                               
                                ">

                        <div class="service-img" style="
                                background:url('${item.imagelink}' );
                                height:240px; background-size:cover;
                                ">
                            <div class="service-overlay">
                                <p>${item.desc} </p>
                            </div>
                        </div>
                        <div class="service-text">
                            <h3 style="font-size:14px">${item.nom} </h3> 
                                <a class="btn" href=""><i class='bx bxs-florist bx-sm'></i></a>
                           
                        </div>
                    </div>
                </div>
         
      `
 
      serviceSection.innerHTML += serviceItem

})

