function sendEmail(){
    ( ()=>{
       emailjs.init("DHzwqZZwIDiB0jCoM")
    } )()

    Swal.fire({
      title: "Chargement...",
      text: "Veuillez patienter.",
      allowOutsideClick: false,
      willOpen: () => Swal.showLoading()
    });

    var params={
       sendername:document.querySelector("#sendername").value,
       to:document.querySelector("#to").value,
       subject:document.querySelector("#subject").value,
        message:document.querySelector("#message").value,

   } 
   var serviceId="service_369dwpa"; 
   var  templateId="template_thznu7e"

   emailjs.send(serviceId,templateId,params).then(res=>{
      Swal.fire({
         title: 'Félicitation!',
         html: 'Votre message a été envoyé avec succès <br> à l\'adresse email de l\'entreprise.',
         icon: 'success',
         confirmButtonText: 'Fermer',
         timer: 3000 // Optional: auto-close after 3 seconds
     });
     document.getElementById("sendername").value="";
      document.getElementById("subject").value="";
     document.getElementById("message").value="";

   }) 


   
   }