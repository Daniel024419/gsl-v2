Implement Google Drive read-only integration in my Laravel 12 application.

Requirements:
- Do NOT use Flysystem or any Google Drive filesystem adapter.
- Use the official Google API Client library (`google/apiclient`).
- The application only needs to READ files from Google Drive. No upload, update, or delete operations.

Implementation details:
1. Install:
   composer require google/apiclient:^2.18

2. Add these environment variables:
   GOOGLE_DRIVE_CLIENT_ID=
   GOOGLE_DRIVE_CLIENT_SECRET=
   GOOGLE_DRIVE_REFRESH_TOKEN=
   GOOGLE_DRIVE_FOLDER_ID=

3. Add Google Drive configuration in `config/services.php`:

   'google_drive' => [
       'client_id' => env('GOOGLE_DRIVE_CLIENT_ID'),
       'client_secret' => env('GOOGLE_DRIVE_CLIENT_SECRET'),
       'refresh_token' => env('GOOGLE_DRIVE_REFRESH_TOKEN'),
       'folder_id' => env('GOOGLE_DRIVE_FOLDER_ID'),
   ],

4. Create:
   app/Services/GoogleDriveService.php

The service should:
- Initialize Google Client using OAuth refresh token.
- Connect to Google Drive API v3.
- Provide methods:
  - listFiles()
  - getFile($fileId)
  - downloadFile($fileId)
  - searchFiles($name)

5. Add proper Laravel dependency injection support.

Example usage:
- Controller calls GoogleDriveService.
- List files from the configured folder.
- Read file metadata (id, name, mimeType, size, modifiedTime).
- Stream file content when requested.

6. Add:
- Error handling for invalid credentials.
- Logging using Laravel Log facade.
- Clear exceptions when Google Drive API fails.

7. Follow Laravel 12 conventions:
- Use typed properties.
- Use constructor dependency injection.
- Keep Google API logic isolated in the service layer.
- Do not expose credentials in controllers.

Generate all required PHP files and show the exact code changes.