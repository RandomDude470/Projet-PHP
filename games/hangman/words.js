const clavier = document.querySelector('.clavier')
const image = document.querySelector('img')

for (let index = 0; index < 26; index++) {
    let arr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    clavier.innerHTML += '<button class="alphabet">' + arr[index] + '</button>';
}
const words = [
    "ABSTRACTION",
    "ACCELERATION",
    "ADAPTATION",
    "AGRESSION",
    "AMELIORATION",
    "ANALYSE",
    "APPRENTISSAGE",
    "ARCHITECTURE",
    "ASSOCIATION",
    "AUTOMATISATION",
    "CALCUL",
    "CAPACITE",
    "CARACTERISTIQUE",
    "COMPARAISON",
    "COMPLEXITE",
    "CONCEPTION",
    "CONNAISSANCE",
    "CONSTRUCTION",
    "CONTENU",
    "COORDINATION",
    "CREATIVITE",
    "DECISION",
    "DECOUVERTE",
    "DEFINITION",
    "DEVELOPPEMENT",
    "DIFFERENCE",
    "DIMENSION",
    "DISPOSITION",
    "DISSOLUTION",
    "EFFICACITE",
    "ENVIRONNEMENT",
    "EQUILIBRE",
    "EVALUATION",
    "EVOLUTION",
    "EXPERIMENTATION",
    "FONCTIONNALITE",
    "FORMATION",
    "GESTION",
    "IDENTIFICATION",
    "IMPLICATION",
    "INFORMATION",
    "INNOVATION",
    "INSCRIPTION",
    "INSTRUCTION",
    "INTERACTION",
    "INTEGRATION",
    "INTERPRETATION",
    "INTRODUCTION",
    "INVESTIGATION",
    "MODIFICATION",
    "MOTIVATION",
    "OBJECTIF",
    "ORGANISATION",
    "PARTICIPATION",
    "PERFORMANCE",
    "PLANIFICATION",
    "PRESENTATION",
    "PROBLEME",
    "PROCESSUS",
    "PRODUCTION",
    "PROGRAMME",
    "PROJET",
    "QUALITE",
    "QUANTITE",
    "RAPPORT",
    "RECHERCHE",
    "REFERENCE",
    "RELATION",
    "REPRESENTATION",
    "RESOLUTION",
    "RESPONSABILITE",
    "REUSSITE",
    "SECURITE",
    "SOLUTION",
    "STRATEGIE",
    "STRUCTURE",
    "SYSTEME",
    "TECHNOLOGIE",
    "TRANSFORMATION"
  ];
  
let x = parseInt(Math.random() * 79)
const Chosenword = words[x]
const mot_a_deviner = document.querySelector('#mot_a_deviner');
let tries = 8
let wordlenght = Chosenword.length-2
for (let index = 0; index < Chosenword.length; index++) {
    if (index != 0 && index != Chosenword.length - 1) {
        mot_a_deviner.innerHTML += "_ "

    } else {

        mot_a_deviner.innerHTML += Chosenword[index]
    }
}
let boutons = [...clavier.children]
boutons.forEach((bouton)=>{
    let lettre = bouton.innerHTML
    bouton.addEventListener("click",function newf() {
        let matchCounter = 0
        for (let index = 0; index < Chosenword.length; index++) {
            if (index!=0 && index!=Chosenword.length-1) {
                if (lettre == Chosenword[index]) {
                
                let string = [...mot_a_deviner.innerHTML]
                string = string.filter(char => char!=' ')
                string[index]= lettre
                mot_a_deviner.innerHTML = string.join(' ')
                matchCounter++
               }
            }
            
        }
        if (matchCounter ==0) {
            tries--
            image.setAttribute("src","images/"+(8-tries)+".png")
        }else{
            wordlenght-=matchCounter
        }
        if (tries<=0) {
            document.write("<h1>You Lost idiot couldnt think of the word : "+Chosenword+"</h1>")
        } 
         if(wordlenght<=0){
            document.write("<h1>Congrats you are smarter than a monkey </h1>")
        }
        console.log(tries);
        bouton.removeEventListener("click",newf)
        bouton.style.color = "gray"
    })
})
