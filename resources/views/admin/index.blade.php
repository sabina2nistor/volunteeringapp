@extends('main')

@section('title', '| Pagina de administrare')

@section('container')

<div id="main">
	<div class="container">
		<div class="board">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
	        <div class="board-inner">
	            <ul class="nav nav-tabs" id="myTab">
	                <div class="liner"></div>
	                    <li class="active">
	                     	<a href="#association" data-toggle="tab" title="Creare asociatie">
	                      		<span class="round-tabs one">
	                              <i class="glyphicon glyphicon-plus"></i>
	                      		</span> 
	                  		</a>
	                  	</li>

	                  	<li>
		                  	<a href="#tags" data-toggle="tab" title="Creare taguri">
		                     	<span class="round-tabs two">
		                         	<i class="glyphicon glyphicon-tag"></i>
		                     	</span> 
		           			</a>
	                 	</li>
	                	<li>
	                 		<a href="#projects" data-toggle="tab" title="Creare proiecte">
		                     	<span class="round-tabs three">
		                          	<i class="glyphicon glyphicon-pencil"></i>
		                     	</span> 
	                   		</a>
	                  	</li>

	                    <li>
		                    <a href="#usersall" data-toggle="tab" title="Toti userii">
		                        <span class="round-tabs four">
		                              <i class="fa fa-users"></i>
		                        </span> 
		                    </a>
	                    </li>

	                    <li>
	                     	<a href="#users" data-toggle="tab" title="Aprobare voluntari in aplicatie">
	                         	<span class="round-tabs five">
	                             	<i class="fa fa-universal-access"></i>
	                         	</span> </a>
	                     </li>

	                    {{-- <li>
	                     	<a href="#ceva" data-toggle="tab" title="Aprobare voluntari in aplicatie">
	                         	<span class="round-tabs five">
	                             	<i class="glyphicon glyphicon-ok"></i>
	                         	</span> </a>
	                     </li> --}}
	                     
	            </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="association">

                    <h3 class="head text-center">Creare Asociatie {{-- <span style="color:#f48260;">♥</span> --}}</h3>
                    <p class="narrow text-center">
                        Buna! Daca te afli pe aceasta pagina inseamna ca esti Administrator si iti doresti sa creezi o asociatie noua. Acest buton iti va permite sa creezi o noua asociatie unde iti poti alege un logo semnificativ, domeniul din care face parte asociatia, locatia, si bineinteles numele ei.
                    </p>
                    <p class="narrow text-center bg-danger">In cadrul paginii de creare asociatie ai acces si la crearea DEPARTAMENTELOR</p>

                          
                    <p class="text-center">
                    		<a href="{{ route('associations.index') }}" class="btn btn-success btn-outline green"> Asociatie <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                	</p>
                </div>

                <div class="tab-pane fade" id="tags">
                    <h3 class="head text-center">Creare Taguri</h3>
                    <p class="narrow text-center">
                         Aceast link te va trimite catre o pagina unde vei putea crea TAGURI ce vor ajuta voluntarii sa realizeze SEARCH-UL in functie de elementele definitorii pentru proiecte. 
                    </p>
                    <p class="narrow text-center">Un exemplu de tag ar putea fi numele proiectului <kbd>Proiect</kbd>
                    </p>
                          
                    <p class="text-center">
                    	<a href="{{ route('tags.index') }} " class="btn btn-success btn-outline green"> Taguri <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                	</p>                          
                </div>

                <div class="tab-pane fade" id="projects">
                    <h3 class="head text-center">Creare Proiecte</h3>
                    <p class="narrow text-center">
                          In cazul in care nu exista un Project Manager, atunci Administratorul este singurul care poate crea proiecte.
                    </p>
                    <p class="narrow text-center" >Pentru fiecare proiect poate customiza titlul, din ce departament face parte, linkul catre acesta, tagurile reprezentative si poate folosi aria de text cu butoanele sale de formatare. De asemenea sunt necesare date de start si de final pentru proiecte </p>
                    <p class="narrow text-center bg-danger">In aceasta pagina se pot adauga si TASKURILE pentru fiecare proiect</p>
                          
                    <p class="text-center">
                    	<a href="{{ route('projects.index') }} " class="btn btn-success btn-outline green"> Proiect <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                	</p>
                </div>

                <div class="tab-pane fade" id="usersall">
                    <h3 class="head text-center">Toti voluntarii</h3>
                    <p class="narrow text-center">
                         Aceasta pagina este destinata vizualizarii tuturor voluntarilor din asociatie
                    </p>
                          
                    <p class="text-center">
                    	<a href="{{ route('admin.indexusers') }}" class="btn btn-success btn-outline green"> Toti voluntarii <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                	</p>
                </div>

                <div class="tab-pane fade" id="users">
					<div class="text-center">
					    <i class="img-intro icon-checkmark-circle"></i>
					</div>
					<h3 class="head text-center">Aprobare voluntari in aplicatie {{-- <span style="color:#f48260;">♥</span>  --}}</h3>
					<p class="narrow text-center">
					   Pagina unde voluntarii nou intrati vor fi aprobati sau dezaprobati in a folosi aplicatia.
					</p>
					<p class="text-center">
                    	<a href="{{ route('admin.indexappoved') }}" class="btn btn-success btn-outline green"> Aprobare voluntari <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                	</p>
				</div>

				{{-- <div class="tab-pane fade" id="ceva">
					<div class="text-center">
					    <i class="img-intro icon-checkmark-circle"></i>
					</div>
					<h3 class="head text-center">thanks for staying tuned! <span style="color:#f48260;">♥</span> Bootstrap</h3>
					<p class="narrow text-center">
					  Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
					</p>
				</div> --}}
				<div class="clearfix"></div>
			</div>
		</div>
</div>

@stop

@section('scripts')
<script>
	$(function(){
	$('a[title]').tooltip();
	});
</script>
@stop

