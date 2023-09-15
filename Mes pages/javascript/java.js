/*function recherche() {
   let x=document.getelementbyid().value;
    x=x.toLowerCase();
}*/ 
const persons = [
    {nom: 'Pantalon', image:'Image/pantalon.jpg'},
    {nom: 'T-shirt', image:'Image/t-shirt.png'},
]
const searchinput = document.getElementById('search');

searchinput.addEventListener('keyup', function(){
    const input = searchinput.value;
    const result = persons.filter(item => item.nom.toLowerCase().includes(input.toLowerCase()));

    let suggestion = '';
    result.forEach(resultItem => 
        suggestion += '<div class="suggestion">${resultItem.nom}</div>'
        )
    document.getElementById()
})