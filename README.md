<h1>Symfony Library management </h1>


To install, Open you'r termnial, then : </br>
1)php app/console doctrine:database:create</br>
2)php app/console doctrine:schema:update --force</br>
3)php app/console fos:user:create </br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;username:admin</br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	password:xxxxxx</br>
4)php app/console fos:user:promote	</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		admin</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		ROLE_ADMIN</br>
5)php app/console fos:user:activate</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		admin</br>
6)php app/console server:run 127.0.0.0:8000</br>
7)open : http://127.0.0.0:8000/login</br>
8)open : http://127.0.0.0:8000/ab (Administered space)</br>
 <h3>Some screenshots : </h3>
 <img src="http://i.imgur.com/VwhCSsE.png"/>
 <img src="http://i.imgur.com/GhosroI.png" />

TODO: If you want to made some improvement ;) (the project is based on <a href="https://github.com/javiereguiluz/EasyAdminBundle"> easy admin bundle</a> , you can read doc from github</br>


- change route "/ab" to "/admin"
- verify all validators
- import / export , you can use <a href="https://github.com/goodby/csv" > goodby csv bundle </a> ,or u'r one implementation
- correct search bar (filtration systém)
- add a new dashbord (welcome page) with some stasitcs and charts plugins(exmple: <a href="https://github.com/marcaube/ObHighchartsBundle" >ObHighchartsBundle</a> )
- update <a href="https://github.com/FriendsOfSymfony/FOSUserBundle" >fos user bundle</a> and add some javascript stuff
- Activate APC - Accelerator PHP or other accelerator
- improve cache management system
- improve orm transaction

good luck :)
 
 
