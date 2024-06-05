
# Shop Website

**Overview**

This repository provides a full-fledged e-commerce platform built using Laravel, offering a user-friendly shopping experience. Key functionalities include:

-   **Product Listings:** Explore a diverse selection of products for purchase.
-   **Cart Management:** Add items to your cart, review cart contents, and proceed to checkout seamlessly.
-   **Secure Checkout:** Complete transactions with confidence using Stripe integration.
-   **Order Management:** Track and manage your orders efficiently.
-   **Real-Time Interactions:** Enjoy a streamlined shopping experience with 9 Livewire components for interactive cart and checkout features.

**Installation**

1.  **Clone the Repository:**
    
    
    ```
    git clone https://github.com/hamed-elfayome/shop-website.git
    ```

    
2.  **Navigate & Install Dependencies:**
    
    
    ```
    cd shop-website
    composer install
    npm install && npm run dev
    ```
    
    
3.  **Set Up Environment:**
    
    -   Copy `.env.example` to `.env` and configure your environment variables (including Stripe API keys).
    
4.  **Generate Application Key:**
    

    
    ```
    php artisan key:generate
    ```
    

    
5.  **Migrate Database:**
    

    
    ```
    php artisan migrate
    ```
    

    
6.  **Serve the Application:**
    

    
    ```
    php artisan serve
    ```
    
    
    Access the website at http://localhost:8000 in your web browser.
    

**Testing**

The project prioritizes code quality. Over 15 unit tests are included to ensure proper application functionality. Run these tests using:



```
php artisan test
```



**Continuous Integration**

Leveraging GitHub Actions, unit tests are automatically executed on every code push to the repository, safeguarding code quality.
