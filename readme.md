# CTA Manager

The CTA Manager is part of **RKD Identity** (though "Identity" may change at any time). At a high level, the CTA Manager is a service that allows for the creation and management of Calls to Action (CTAs) that can be displayed on a nonprofit's website. It handles the following tasks:
- Creation, updating, reporting, and deletion of CTAs
- Viewing and interacting with existing CTAs

### Technology Stack
- **Codebase**: PHP, using the CodeIgniter 4 framework.
- **Database**: PostgreSQL (Primary application database of Identity).

_The production database server can be found [here](https://cloud.digitalocean.com/databases/3a12b120-696c-4e04-b110-c572a3098d6b?i=4c845b)._

## Types of CTAs
The CTA Manager supports four types of CTAs:

1. **Lightboxes**  
   Full-image pop-up windows. The uploaded image can include buttons, text, and hyperlinks. Lightboxes support clickable zones and alt text annotations. Specific dimensions are required, and both desktop (landscape) and mobile (portrait) versions of the image are necessary.

2. **Banners**  
   Rectangular images that appear at the top of the website. These can be used to promote offers, events, or services. A clickable button can be added optionally.

3. **Bugs**  
   Small, non-intrusive pop-ups that appear in the corner of a website. Like banners, they can promote offers, events, or services, with an optional clickable button.

4. **Content Modals**  
   Pop-up windows containing a headline, body text, an optional header image, and an optional clickable button.

## Performance Tracking
Each CTA type has its own dashboard showing performance metrics:
- **Impressions**: Number of times the CTA was displayed.
- **Clicks**: Number of times the CTA was clicked.
- **Dismissals**: Number of times the CTA was dismissed.

### Google Analytics Integration
All CTAs emit three custom events to Google Analytics:
- **Opens**
- **Clicks**
- **Dismissals**

This allows tracking performance and understanding the revenue attributed to each CTA through Google Analytics' eCommerce tracking.

## Client Setup Process
Setting up a new client involves three steps:

1. Add a new client to the "clients" table via the Identity Admin Console or manually via SQL.
2. Add the client's website to the "websites" table via the CTA Manager (`/Websites/create`).
3. Generate a 2-line JavaScript code unique to the client, which must be added to their website (either via Google Tag Manager or directly into the site’s codebase).

Once the code is added to the client’s website, they can begin creating and managing CTAs.

## Roles & Permissions
### **Admins**
- Full access to create, update, delete, publish, and unpublish CTAs for any client.

### **RKD Users**
- Can create, update, delete, and publish CTAs for assigned clients.
- Can publish CTAs that others create but cannot publish their own.
- Can unpublish any currently published CTAs.

### **Client Users**
- Same permissions as RKD Users, but restricted to their own client.
- Can publish/unpublish their own CTAs or others' CTAs.

## Local Setup Instructions

1. Clone the repository:
   ```bash
   git clone git@github.com:rkdgroup/cta-manager.git
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Create the `.env` file:
   ```bash
   cp env.example .env
   ```

4. Set write permissions:
   ```bash
   chmod -R 777 writable
   ```

5. Fill in the `.env` file with appropriate values (ask a teammate for details).

6. Run migrations:
   ```bash
   php spark migrate
   ```

7. Serve the application locally:
   ```bash
   php spark serve
   ```

8. Insert a user record with your email and set `admin = true` in the users table.

9. Attempt to log in (`/Auth/login`). You should receive an email with an authentication code. Note that other routes may not work until you're logged in.

10. (Optional) Seed the database with example data by hitting the `/Examples/seed` route if you’re working in a local or test environment.