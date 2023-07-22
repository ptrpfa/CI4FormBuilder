### CSC1106 Web Programming: Group 7 🤑
2200692 Pang Zi Jian Adrian <br>
2200795 Ashley Tay Yong Jun <br>
2200959 Peter Febrianto Afandy <br>
2201018 Jeffrey Yap Wan Lin <br>
2201052 Nur Hakeem Bin Azman <br>
2201159 Ryan Lai Wei Shao

### Submission Files
```
README.md (this file)

docs/ (screenshots)

formgenerator/ (Admin web application for managing Forms)

library/ (empty CI4 web application for you to start development!)

```

### Installation Instructions
1. If you are building a web application from scratch, create a copy of the `library/` project which contains all functions for this Form Builder library.
    ```
    cp -r library <project name>
    ```
2. Modify the database credentials in the ``.env`` file. By default, it is configured to connect to our cloud MySQL database.
3. Run this command to create the database schema in your configured database: 
    ```
    php spark db:create FormBuilder
    ```
4. Run this command to create all necessary tables in your database: 
    ```
    php spark migrate --all
    ```
5. Run this command to start the web application: 
    ```
    php spark serve
    ```
6. If you plan on using CI4 Shield for authentication, create an account to login by navigating to `/login`.
    ![login](docs/login.png)
    
    configure `Autoload.php` for autoloading helper functions

7. Start coding! Please refer to the documentation provided to learn how to use our library, or click [here](https://ptrpfa.notion.site/5959fa04a29c483fbb2190002c2016e5?v=0f3e85b64ee2489bbae6665707c43e3c&pvs=4) to view our shared Notion documentation.