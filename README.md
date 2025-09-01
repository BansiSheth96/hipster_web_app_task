Documentation Of Project Setup:-
https://docs.google.com/document/d/1VPnW6974PFtDMHr09fiUv3YcmmAhJrz7U3981U7fJus/edit?usp=sharing


Admin Module ScreenShots:-
<img width="1933" height="1211" alt="Login" src="https://github.com/user-attachments/assets/a6cdbb46-399c-4055-97b8-2b5e56f2fb7b" /><br><br>
<img width="1929" height="1178" alt="Register" src="https://github.com/user-attachments/assets/cc1d3a68-aafd-4c39-9c8a-eaf5d321264a" /><br><br>
<img width="2244" height="941" alt="admin_dashboard" src="https://github.com/user-attachments/assets/8a05e6e5-bdd1-4d00-af57-38fc1a183bd5" /><br><br>
<img width="2246" height="1421" alt="admin_products" src="https://github.com/user-attachments/assets/41387bfb-8bfa-4c73-8566-d457b45d03dd" /><br><br>
<img width="2247" height="1433" alt="admin_products_with_paginate" src="https://github.com/user-attachments/assets/70bf870d-04bb-4c25-87a2-0069be96bf94" /><br><br>
<img width="2161" height="1248" alt="admin_create_product" src="https://github.com/user-attachments/assets/2ce2438c-235d-49b1-a72e-21dcc518013d" /><br><br>
<img width="2219" height="1127" alt="admin_view_product" src="https://github.com/user-attachments/assets/4b8aa5e1-6766-4e6e-89e6-e602f392995c" /><br><br>
<img width="2182" height="1392" alt="admin_product_update" src="https://github.com/user-attachments/assets/96298897-0b9a-446f-a984-9186065ae530" /><br><br>
<img width="2256" height="1408" alt="admin_product_delete" src="https://github.com/user-attachments/assets/6bd720e9-881f-421c-ac9c-99724f080bb6" /><br><br>
<img width="2247" height="1198" alt="admin_manage_orders" src="https://github.com/user-attachments/assets/5280bc13-5132-44ef-a082-31f0fa051eba" /><br><br>
<img width="2254" height="1097" alt="admin_bulk_import_products" src="https://github.com/user-attachments/assets/a4f5d1c2-f88f-4089-ac92-f9469ad768d3" /><br><br>

Customer Module Screenshots:-
<img width="2256" height="1080" alt="customer_dashboard" src="https://github.com/user-attachments/assets/7f15f146-d0bc-4e99-b191-922f2a65d1a2" /><br><br>
<img width="2199" height="1215" alt="customer_browse_product_with_login" src="https://github.com/user-attachments/assets/71d0535c-217a-4d67-9a07-5ca892480b86" /><br><br>
<img width="2207" height="1196" alt="customer_place_an_order" src="https://github.com/user-attachments/assets/e838ed2a-14c6-4780-a1b0-cf70580f3038" /><br><br>
<img width="2242" height="1284" alt="customer_order_placed_details" src="https://github.com/user-attachments/assets/e5f34a4b-1b72-4dd2-86be-544cf1fe97ac" /><br><br>
<img width="2214" height="882" alt="customer_product_search" src="https://github.com/user-attachments/assets/2b3409fb-34fa-4cca-b19a-c44f88c592e9" /><br><br>

Customer Browse Product Without Login:-
<img width="2228" height="1336" alt="customer_browse_product_without_login" src="https://github.com/user-attachments/assets/5bc88f46-7d78-4d01-bd6b-c863eb18d96f" />


**Laravel Developer– Final Requirements**
Objective:-
Build a secure and optimized Laravel web application demonstrating your expertise in:
Multi-authentication system
Real-time updates using websockets
Web push notifications
Efficient large-scale product import using Laravel queues and batch processing

Tasks & Features:-
1. Multiple Authentication Guards
Implement separate login, registration, and dashboards for Admin and Customer users.
Use Laravel’s built-in multi-authentication system ( Auth::guard() ).
Protect routes using middleware per guard (e.g., auth:admin , auth:customer ).

2. Product Management:-
Admin Features:
CRUD operations for products (fields: name , description , price , image , category ,
stock ).
Bulk import of up to 100,000 products via CSV/Excel using chunked processing and Laravel
queues. If no image is provided in the CSV, a default image should be used for the product.
Provide products_sample_import.csv with the actual demo data used for testing the
import functionality. Candidates should generate this file after implementing and testing the
import feature.
Customer Features:
Browse, search, and paginate product listings.

3. Order Management:-
Customer: Place orders for available products.
Admin: View and update order status ( Pending , Shipped , Delivered ).

4. Real-Time Updates (Websockets):-
Use real-time updates via websockets (framework or library of your choice).
Broadcast order status updates in real-time to customers (no page refresh).
Show real-time online/offline presence of users (Admins and Customers) in the Admin
dashboard using Presence Channels, and ensure this presence status is also updated and
stored in the database.

5. Web Push Notifications
Integrate a push notification service (any of your choice).
Notify Customers via browser push notifications & websockets when Admin updates order
status.
Must work instantly and not rely on polling.

6. Optimized Product Import
Allow Admin to upload CSV/Excel files with up to 100k products.
Use any suitable approach or library for chunked reading and processing.
Validate each row and queue the job
Prevent timeouts using background processing.

Testing Requirements:-
Add at least one feature test and one unit test for any key user flow such as:
Product creation
Order placement
Bulk product import logic and validation
Use Laravel’s built-in test suite ( php artisan test ) to run your test cases.

UI Expectations:-
This is a backend-focused assignment. You are expected to demonstrate the core logic, backend
functionality, real-time interactions, and testability of your code. The UI can be minimal, basic, or even
unstyled — the emphasis is not on design, responsiveness, or frontend frameworks.
A simple HTML-based or Blade-rendered UI is sufficient as long as it clearly presents the implemented
backend features.

Deliverables:-
Codebase: Push entire Laravel project to a public Git repository. No zip uploads.
Sample File: Include products_sample_import.csv in repo. This file should contain demo
data that you personally used to test and verify the import functionality.
Documentation (README.md)
Setup instructions
Multi-auth strategy and route protection details
Websocket stack used.
Web push notification setup and subscription logic
Bulk import implementation details and optimizations
Testing guide (how to run and what it covers)
Notes on architectural or performance decisions
Screencast (Optional): 3–5 minute video walkthrough of app + code (host on any platform such
as YouTube, Loom, or others)


Rules & Notes:-
All code must be original. No AI/copilot/suggestions/tutorial copy-paste.
Use WebSocket broadcasting only. No AJAX polling allowed.
Commit history must show step-by-step development.
Aim for clarity, security, and performance in your implementation.


















