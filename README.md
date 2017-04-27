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
 

TODO: If you want to made some improvement ;) (the project is based on easy admin bundle , you can read doc from github</br>


- change route "/ab" to "/admin"
- verify all validators
- import / export , you can use goodby csv bundle ,or u'r one implementation
- correct search bar (filtration systém)
- add a new dashbord (welcome pgae) with some stasitcs and charts plugins
- update fos user bundle and add some javascript stuff
- Activate APC - Accelerator PHP or other accelerator
- improve cache management system
- improve orm transaction

good luck :)
 
 
