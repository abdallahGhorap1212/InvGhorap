Project Description:

"InvGhorap" is a web application designed to simplify inventory management for small to medium-sized businesses. Built with the Laravel framework, it offers robust features for tracking and managing stock efficiently. Users can add, update, and delete products, monitor available quantities, log sales, and generate detailed reports on inventory status.
Key Features:

    Product Management:
        Add new products with detailed information (e.g., name, quantity, price).
        Update existing product details.
        Delete products as needed.

    Inventory Management:
        Provide an overview of the current inventory with options to filter and sort products based on various criteria.
        Update stock quantities based on sales and new additions.

    Reporting and Analytics:
        Generate detailed reports on inventory and sales activities.
        View analytics on sales trends and stock levels.

    Interactive User Interface:
        Intuitive and user-friendly interface design that simplifies inventory management tasks.

Technologies Used:

    PHP: The primary language used for developing the application.
    Laravel: The main PHP framework utilized for building the application, providing a strong architecture and ease of development.
    Blade: Laravel’s templating engine used for creating front-end views.
    MySQL: The database system used to store inventory data.
    JavaScript: Enhances interactivity and dynamic functionality in the user interface.
    HTML & CSS: For designing and building the user interface.

Libraries and Packages Used:

    Laravel Packages:
        laravel/framework: The core framework providing the foundational structure.
        fideloper/proxy: Facilitates support for HTTP proxies and improves compatibility with various environments.
        fruitcake/laravel-cors: Manages Cross-Origin Resource Sharing (CORS) settings.
        guzzlehttp/guzzle: A powerful HTTP client for handling external HTTP requests.
        laravel/tinker: Offers an interactive shell for running PHP code within the Laravel environment.
        laravel/sanctum: Manages API authentication using tokens.
        laravel/ui: Provides front-end scaffolding and integration with tools like Bootstrap and Vue.js.

    Frontend Libraries:
        Bootstrap: A widely-used CSS framework for responsive and modern user interface design.
        Vue.js: A JavaScript framework for building interactive and component-based user interfaces.

    Development Tools:
        phpunit/phpunit: A testing framework for PHP to write and run unit tests.
        fakerphp/faker: Generates fake data for testing and development purposes.
        barryvdh/laravel-debugbar: Adds a developer toolbar for debugging and monitoring application performance.
        barryvdh/laravel-ide-helper: Enhances development experience with IDEs by providing improved autocomplete features.

Project Structure:

    app Directory: Contains the core application code, including Controllers and Models.
    resources Directory: Holds Blade view files for front-end, along with JavaScript and CSS assets.
    routes Directory: Defines the application's routes.
    database Directory: Contains migration files and seed data.
    public Directory: Houses public assets like images and scripts.
