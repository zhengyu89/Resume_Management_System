# Resume Management System

This is a web-based platform designed for job seekers and employers. [cite_start]Job seekers can create a profile, upload their resume, and manage their information[cite: 15, 23]. [cite_start]Employers can search for talent, view resumes, and contact potential candidates[cite: 15, 23].

***

## 🚀 Project Overview

[cite_start]The Resume Management System allows job seekers to upload their resumes and make them visible to potential employers[cite: 15, 23]. [cite_start]Employers can browse through the available talent, view detailed profiles, and download resumes[cite: 15, 23]. [cite_start]The system is designed to be a seamless interface for both job seekers and employers[cite: 18].

***

## ✨ Features

### For Job Seekers:
* [cite_start]**Account Management**: Register for a new account, log in, and utilize a password reset option via email verification[cite: 26, 127, 165, 194].
* [cite_start]**Profile Creation**: Build a comprehensive personal profile including an "about" section, work experience, and education details[cite: 26, 238].
* [cite_start]**Resume Management**: Upload a resume, preview it, and see it displayed on your profile[cite: 16, 26, 282].
* [cite_start]**Profile Customization**: Add and update your profile picture and cover image[cite: 238].
* [cite_start]**Account Deletion**: A confirmation prompt ensures that you do not accidentally delete your account[cite: 292].

### For Employers:
* [cite_start]**Account Management**: Register and log in to the platform[cite: 26, 300].
* [cite_start]**Talent Search**: A dedicated "Talent Search" page to find candidates[cite: 339, 340]. You can filter and search for candidates by:
    * [cite_start]Username [cite: 379]
    * [cite_start]Study Field [cite: 357]
    * [cite_start]Language [cite: 357]
    * [cite_start]Minimum Work Experience [cite: 358]
* [cite_start]**Candidate Profiles**: View detailed profiles of potential talents[cite: 382].
* [cite_start]**Resume Access**: Preview and download candidates' resumes[cite: 16, 400].
* [cite_start]**FAQ**: A frequently asked questions page with a search functionality to quickly find answers[cite: 16, 414, 425].
* [cite_start]**Profile Management**: Employers can edit their own profiles, including their "about" section, work experience, and education[cite: 26, 440].

***

## 🛠️ Technologies & Tools

The system is built using the following technologies:

* [cite_start]**Frontend**: HTML, CSS, JavaScript, Bootstrap [cite: 17, 20]
* [cite_start]**Backend**: PHP, Laravel [cite: 17, 20]
* [cite_start]**Database**: MySQL [cite: 17, 20]
* [cite_start]**Server**: Laragon [cite: 17, 20]

***

## ⚙️ Setup and Installation

To set up the project locally, please follow these steps:

**Prerequisites:**
1.  [cite_start]Download and install Laragon[cite: 93].
2.  [cite_start]Ensure you have the latest version of PHP and Composer[cite: 95].

**Installation Steps (to be run in the Laragon terminal):**

1.  [cite_start]**Unzip Project**: Unzip the `ProjectGroup8Misty.zip` file[cite: 97].
2.  **Install PHP Dependencies**:
    ```bash
    composer install
    ```
    [cite_start][cite: 100]
3.  **Create Environment File**:
    ```bash
    cp .env.example .env
    ```
    [cite_start][cite: 102]
4.  **Configure Environment**:
    * [cite_start]**Set up your SMTP** in the `.env` file for email functionalities[cite: 104].
    * [cite_start]**Generate a new App Key**[cite: 115]:
        ```bash
        php artisan key:generate
        ```
        [cite_start][cite: 117]
5.  **Run Database Migrations and Seed**:
    ```bash
    php artisan migrate:fresh --seed
    ```
    [cite_start][cite: 119]
6.  **Install Frontend Dependencies**:
    ```bash
    npm install
    ```
    [cite_start][cite: 121]
    Then, build the assets:
    ```bash
    npm run build
    ```
    [cite_start][cite: 122]
7.  **Run the Server**:
    ```bash
    php artisan serve
    ```
    [cite_start][cite: 124]

***

## 🗃️ Database Design

The database schema includes the following tables:
* [cite_start]`Users` [cite: 31]
* [cite_start]`user_resumes` [cite: 53]
* [cite_start]`user_documents` [cite: 40]
* [cite_start]`user_work_experiences` [cite: 55]
* [cite_start]`user_educations` [cite: 39]
* [cite_start]`study_fields` [cite: 30]
* [cite_start]`user_languages` [cite: 66]
* [cite_start]`language` [cite: 75]

[cite_start]Here is the Entity-Relationship Diagram[cite: 29]:

![ERD Diagram](public\assets\ERD_Diagram.jpg) 
*Note: You will need to replace `path/to/your/erd_image.png` with the actual path to the ERD image in your repository.*