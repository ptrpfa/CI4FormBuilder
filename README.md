### CSC1106 Web Programming: Group 7 🤑
2200692 Pang Zi Jian Adrian <br>
2200795 Ashley Tay Yong Jun <br>
2200959 Peter Febrianto Afandy <br>
2201018 Jeffrey Yap Wan Lin <br>
2201052 Nur Hakeem Bin Azman <br>
2201159 Ryan Lai Wei Shao


### Installation Instructions
1. Modify database credentials in .env file
2. Run this command to create the database in your localhost: 
    ```
    php spark db:create FormBuilder
    ```
3. Run this command to create all necessary tables: 
    ```
    php spark migrate --all
    ```
4. Run this command to start the web application: 
    ```
    php spark serve
    ```