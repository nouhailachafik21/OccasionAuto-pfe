@extends('layout.app')


@section('styles')
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');




.list-group  a {
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
height: 50px;
text-align: initial;
}

.table {
    width: 100%;
}

.table_header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    padding: 20px;
    background-color: rgb(240, 240, 240);
}

.table_header p {
    color: #000000;
}

button {
    outline: none;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    padding: 10px;
    color: #ffffff;
}

td button:nth-child(1) {
    background-color: #6898ff;
    width: 40px;
}


td button:nth-child(2) {
    background-color: #ff3838;
    width: 40px;
}

.add_new {
    padding: 10px 20px;
    color: #424242;

    font-weight: bold;
}
.add_new :hover{

    color: #0298cf;
}
input {
    padding: 10px 20px;
    margin: 0 10px;
    outline: none;
    border: 1px solid #0298cf;
    border-radius: 6px;
    color: #0298cf;
}

.table_section {
    height: 500px;
    overflow: auto;
}

table {
    width: 100%;
    table-layout: fixed;
    min-width: 900px;
    border-collapse: collapse;
}

thead th {
    position: sticky;
    top: 0;
    background-color: #f6f9fc;
    color: #8493a5;
    font-size: 15px;
}

th,
td {
    border-bottom: 1px solid #dddddd;
    padding: 10px 20px;
    word-break: break-all;
    text-align: center;
}

td img {
    height: 60px;
    width: 60px;
    object-fit: cover;
    border-radius: 15px;
    border: 5px solid #ced0d2;
}

tr:hover td {
    color: #0298cf;
    cursor: pointer;
    background-color: #f6f9fc;
}

.pagination {
    display: flex;
    justify-content: flex-end;
    width: 100%;
    padding: 10px 20px;
}

.pagination div {
    padding: 10px;
    border: 2px solid #d5d0d0;
    height: 40px;
    width: 40px;
    border-radius: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #0298cf;
    color: #ffffff;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.75);
    margin: 0 5px;
    cursor: pointer;
}

::placeholder {
    color: #0298cf;
}

::-webkit-scrollbar {
    height: 5px;
    width: 5px;
}

::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

::-webkit-scrollbar-thumb {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
.administration{

    margin-top:150px;
margin-bottom:200px;
width:90%

}

table.experts{

margin-top: 2vw;
}


.icon{

font-size: 25px;
}

.trash{
width: 5px;
color: rgb(253, 99, 99);
}
.edit{

color: #97b9ff;
}

.options{

display: flex;
justify-content: space-around;
align-items: center;
}
.administration-heading{

display: flex;
justify-content: space-between;
align-items: center;
}
.administration-heading button{

border-radius: 5px;
}
.first-modal{

width: 40%;
}




    </style>

@endsection


@section('content')




    <div class="administration">

        <div class="row">

            <div class="col-md-3">

                @include('includes.tables')

            </div>

            <div class="col-md-9">


                <div class="table">
                    <div class="table_header">
                        <h2>Carburants</h2>
                        <div> <button class="add_new">+ Ajouter </button> </div>
                    </div>
                    <div class="table_section">
                        <table>
                            <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Owner</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img src=https://drive.google.com/uc?export=view&id=1oL5yePDRKaJ3rwr2_DedGETXfqtF_gv4 /></td>
                                    <td>Camera</td>
                                    <td>rakhigupta@gmail.com</td>
                                    <td>Rakhi Gupta</td>
                                    <td> <button><i class="fa-solid fa-pen-to-square"></i></button> <button><i class="fa-solid fa-trash"></i></button> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><img src=https://drive.google.com/uc?export=view&id=1evLZhNAss-m_fg9lBys8ULyW1WeOMTkz /></td>
                                    <td>Laptop</td>
                                    <td>vejata@gmail.com</td>
                                    <td>Vejata</td>
                                    <td> <button><i class="fa-solid fa-pen-to-square"></i></button> <button><i class="fa-solid fa-trash"></i></button> </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><img src=https://drive.google.com/uc?export=view&id=12Lof4FhSisnwoQCfpxDUTo4GVr5qWmxB /></td>
                                    <td>Pencil</td>
                                    <td>shweta@gmail.com</td>
                                    <td>Shweta</td>
                                    <td> <button><i class="fa-solid fa-pen-to-square"></i></button> <button><i class="fa-solid fa-trash"></i></button> </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><img src=https://drive.google.com/uc?export=view&id=1mmfcfCVx6S89DCON0gvypzGWX7lwm3tP /></td>
                                    <td>Jeans</td>
                                    <td>anjaligupta@gmail.com</td>
                                    <td>Anjali Gupta</td>
                                    <td> <button><i class="fa-solid fa-pen-to-square"></i></button> <button><i class="fa-solid fa-trash"></i></button> </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><img src=https://drive.google.com/uc?export=view&id=1FqkzzBCVdx39-OpB79cbzYty-k-P03y5 /></td>
                                    <td>Iphone</td>
                                    <td>adarsh@gmail.com</td>
                                    <td>Adarsh</td>
                                    <td> <button><i class="fa-solid fa-pen-to-square"></i></button> <button><i class="fa-solid fa-trash"></i></button> </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><img src=https://drive.google.com/uc?export=view&id=1U6xVbcyrPs7k2klDzkXMKA0TqZdFVBsU /></td>
                                    <td>Pocket Golden Watch</td>
                                    <td>monti@gmail.com</td>
                                    <td>Monti</td>
                                    <td> <button><i class="fa-solid fa-pen-to-square"></i></button> <button><i class="fa-solid fa-trash"></i></button> </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td><img src=https://drive.google.com/uc?export=view&id=12JjdBJPUSmMTpXwwhyERt8doSQhmLHPX /></td>
                                    <td>Pocket Watch</td>
                                    <td>naveen@gmail.com</td>
                                    <td>Naveen</td>
                                    <td> <button><i class="fa-solid fa-pen-to-square"></i></button> <button><i class="fa-solid fa-trash"></i></button> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <div><i class="fa-solid fa-angles-left"></i></div>
                        <div><i class="fa-solid fa-chevron-left"></i></div>
                        <div>1</div>
                        <div>2</div>
                        <div><i class="fa-solid fa-chevron-right"></i></div>
                        <div><i class="fa-solid fa-angles-right"></i></div>
                    </div>
                </div>



            </div>

        </div>
    </div>
@endsection

