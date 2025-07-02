# Resume Management System

This is a web-based platform designed for job seekers and employers. Job seekers can create a profile, upload their resume, and manage their information. Employers can search for talent, view resumes, and contact potential candidates.
<img src="public\assets\ResumeManagerHomepage.png" alt="ERD Diagram" width="1000"/>
***

## 🚀 Project Overview

The Resume Management System allows job seekers to upload their resumes and make them visible to potential employers. Employers can browse through the available talent, view detailed profiles, and download resumes. The system is designed to be a seamless interface for both job seekers and employers.

***

## ✨ Features

### For Job Seekers:
* **Account Management**: Register for a new account, log in, and utilize a password reset option via email verification.
* **Profile Creation**: Build a comprehensive personal profile including an "about" section, work experience, and education details.
* **Resume Management**: Upload a resume, preview it, and see it displayed on your profile.
* **Profile Customization**: Add and update your profile picture and cover image.
* **Account Deletion**: A confirmation prompt ensures that you do not accidentally delete your account.

### For Employers:
* **Account Management**: Register and log in to the platform.
* **Talent Search**: A dedicated "Talent Search" page to find candidates. You can filter and search for candidates by:
    * Username
    * Study Field
    * Language
    * Minimum Work Experience
* **Candidate Profiles**: View detailed profiles of potential talents.
* **Resume Access**: Preview and download candidates' resumes.
* **FAQ**: A frequently asked questions page with a search functionality to quickly find answers.
* **Profile Management**: Employers can edit their own profiles, including their "about" section, work experience, and education.

***

## 🛠️ Technologies & Tools

The system is built using the following technologies:

* **Frontend**: HTML, CSS, JavaScript, Bootstrap
* **Backend**: PHP, Laravel
* **Database**: MySQL
* **Server**: Laragon

***

## ⚙️ Setup and Installation

To set up the project locally, please follow these steps:

**Prerequisites:**
1.  Download and install Laragon.
2.  Ensure you have the latest version of PHP and Composer.

**Installation Steps (to be run in the Laragon terminal):**

1.  **Unzip Project**: Unzip the `ProjectGroup8Misty.zip` file.
2.  **Install PHP Dependencies**:
    ```bash
    composer install
    ```
   
3.  **Create Environment File**:
    ```bash
    cp .env.example .env
    ```
   
4.  **Configure Environment**:
    * **Set up your SMTP** in the `.env` file for email functionalities.
    * **Generate a new App Key**:
        ```bash
        php artisan key:generate
        ```
       
5.  **Run Database Migrations and Seed**:
    ```bash
    php artisan migrate:fresh --seed
    ```
   
6.  **Install Frontend Dependencies**:
    ```bash
    npm install
    ```
   
    Then, build the assets:
    ```bash
    npm run build
    ```
   
7.  **Run the Server**:
    ```bash
    php artisan serve
    ```

***

## 🗃️ Database Design

The database schema includes the following tables:
* `Users`
* `user_resumes`
* `user_documents`
* `user_work_experiences`
* `user_educations`
* `study_fields`
* `user_languages`
* `language`

Here is the Entity-Relationship Diagram:

<img src="public/assets/ERD_Diagram.jpg" alt="ERD Diagram" width="600"/>

