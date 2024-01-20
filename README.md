### CodeIgniter4 Form Builder Library 🤑
Pang Zi Jian Adrian <br>
Ashley Tay Yong Jun <br>
Peter Febrianto Afandy <br>
Jeffrey Yap Wan Lin <br>
Nur Hakeem Bin Azman <br>
Ryan Lai Wei Shao

### Library Overview
The custom form builder library consists of two main components, each playing a crucial role in enabling the creation and utilization of customizable forms within generic web applications. This system design empowers developers to create dynamic and user-friendly forms, harnessing the full potential of the custom library. To leverage the functionalities of the custom library, programmers are required to set up both components within their web application environment. You can view our presentation [here]().

![System Architecture](docs/arch.png)

The custom CI4 library serves as the backbone of our project, offering a comprehensive collection of reusable classes and functions specifically designed for the creation, customization, and handling of forms. With this library, programmers gain the ability to finely tailor the forms to match their web application's unique requirements, thus enhancing user experience and engagement. To store the structures and responses received for the generated forms, we employed a MySQL relational database. The decision to utilize MySQL is driven by its exceptional performance, scalability, maturity, reliability, and robust features, ensuring efficient data management for the forms.

<u>Database Design</u><br>
The relational database consists of two tables, Form and Response. The Form table is used to store the serialized structure of forms, along with their date of creation, version number for auditing, and custom serialised rules for the form template. The Response table is used to store serialized responses provided by end users of these forms.

![ERD](docs/erd.png)

Programmers are expected to maintain user details independently since such information will not be stored by the library. The Response table includes a `User` field to allow programmers to identify users who have submitted a form response. This intentional separation of information ensures that the library remains lightweight while providing programmers with the flexibility to define their own database design to complement the library. Additionally, migration files are included for each table to facilitate fast deployment of the custom library.

<u>Library Design</u><br>
The library consists of the following components (more details on each function can be viewed in our Notion documentation [here]()):
![Library Functions](docs/library_functions.png)

<u>Deliverables (Admin Dashboard and Bare-Bones Web Application)</u><br>
Two project deliverables have been completed for this project, namely a bare-bones web application project for developers to build on to utilise the form builder library, as well as a user-friendly administrator dashboard web application that is built on the library to showcase its features. The administrative portal also serves as a reference for developers on how to utilise the library’s various features.

![Admin Dashboard](docs/dashboard.png)

### Submission Files
```
README.md (this file)

notion_documentation.pdf (exported documentation from our public Notion documentation page)

docs/ (images for documentation)

sql/ (exported library database)

formgenerator/ (Admin web application for managing Forms)

library/ (empty CI4 web application for you to start development!)

```

### Installation Instructions
1. If you are building a web application from scratch, create a copy of the `library/` project which contains all functions for this Form Builder library.
    ```
    cp -r library <project name>
    ```

    Otherwise, you can create a copy of the `formgenerator/` project which contains the administrator dashboard web application. You can use build on top of this web application or simply study it to take reference for your web application!
    ```
    cp -r formgenerator <project name>
    ```
2. Modify the database credentials in the ``.env`` file. By default, it is configured to connect to our cloud MySQL database.
3. Run this command to create the database schema in your configured database: 
    ```
    php spark db:create FormBuilder
    ```
4. Install CI4 shield by running these commands:
    ```
    composer config minimum-stability dev
    composer config prefer-stable true
    composer require codeigniter4/shield
    php spark shield:setup
    ```
6. Run this command to create all necessary tables in your database: 
    ```
    php spark migrate --all
    ```
7. If you would like to just import our empty MySQL database into your own database using an `SQL` file, run the following command below:
    ```
    mysql -u<username> -p < sql/Empty_22July2023.sql
    ```
8. Run these commands to ensure all dependencies defined in our `composer.json` file are installed and updated:
    ```
    composer install
    composer update
    ```
9. Run this command to start the web application: 
    ```
    php spark serve
    ```
7. Create an account to login by navigating to `/login`.
    ![login](docs/login.png)
8. Start coding! Please refer to the documentation provided to learn how to use our library, or click [here]() to view our shared Notion documentation.
