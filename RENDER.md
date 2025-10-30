Ready-to-deploy to Render
=========================

This project includes a minimal `render.yaml` and a Dockerfile adjusted to use Render's `$PORT` environment variable.

Steps to deploy:

1. Push this repository to GitHub (or your Git provider):

   ```cmd
   cd C:\Users\Emmanuel\todo-api-2
   git add .
   git commit -m "chore: prepare for Render (Dockerfile + render.yaml)"
   git remote add origin https://github.com/<your-username>/todo-api-2.git
   git push -u origin main
   ```

2. On Render:
   - Create a new service -> "Web Service" and connect your Git repository, or enable automatic deploy using the included `render.yaml`.
   - Render will detect the `render.yaml` and create the service named `todo-api-2-web` (or you can create manually and choose Docker).

3. Set environment variables in Render dashboard (Service → Environment → Environment Variables):
   - APP_KEY (generate locally with `php artisan key:generate --show` and paste)
   - APP_URL=https://<your-render-service>.onrender.com
   - DB_CONNECTION=mysql
   - DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD (from your managed DB or external provider)
   - Any AWS_* keys if you plan to use S3 for storage

4. Create / attach a managed database on Render (or use external DB) and add DB_* env vars above.

5. After the service deploys, open the Render Shell (Service → Shell) and run:

   ```bash
   php artisan migrate --force
   php artisan db:seed --force   # only if you want to run seeders
   ```

Notes & recommendations
- `php artisan serve` is fine for small/test apps but consider a production-ready stack (nginx + php-fpm) later.
- Do NOT commit `APP_KEY` or DB passwords to the repository. Use Render's environment variables/secrets.
- Use S3 or a persistent file store for uploaded files, as Render instances have ephemeral filesystem.

If you want, I can:
- commit these changes (already staged in local repo) and push to GitHub if you provide the repository URL (or allow me to run git commands),
- or create a more production-ready multi-stage Dockerfile + nginx.
