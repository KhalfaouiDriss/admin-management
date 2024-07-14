async function gitEmployee() {
   
        let response = await fetch('../Models/api/Fctors.php');
        let data = await response.json();
        console.log(data);

        // Select the table body
        var table = document.querySelector('table');
        var tbody = document.querySelector('tbody');
        data.forEach(e => {

            // let a = document.createElement('a');
            // a.setAttribute("href", "../Components/resume/index.html?id=" + e.id);
            var tr = document.createElement('tr');
            let a = document.createElement('a');
            a.setAttribute("href", 'resume/index.html?id='+e.id);

            var td_Name = document.createElement('td');
            var td_Post = document.createElement('td');
            var td_telephone = document.createElement('td');
            var td_contract = document.createElement('td');
            var td_Neveau = document.createElement('td');

            a.innerHTML ="<b class='text-dark text-decoration-none'>"+ e.prenom + ' ' + e.nom + "<b/>";
            td_Name.appendChild(a)
            
            td_Post.innerHTML = e.post;
            td_telephone.innerHTML = e.telephone;
            td_contract.innerHTML = e.contract;
            td_Neveau.innerHTML = e.Neveau;
            
            tr.appendChild(td_Name);
            tr.appendChild(td_Post);
            tr.appendChild(td_telephone);
            tr.appendChild(td_contract);
            tr.appendChild(td_Neveau);

            //  a.appendChild(tr);

            tbody.appendChild(tr);
        });

        // Select the table and append the table body
        table.appendChild(tbody);
    
}





gitEmployee();
