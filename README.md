# University Project: Development of an Event Aggregator and Newsletter System Based on Nextcloud Calendar  
## Master IWOCS 2023 - 2024  
[Project details](about.md)

---

**Project:** Event Aggregator & Newsletter from Nextcloud Calendar  
**Supervisor:** Julien Baudry  

**Objective:**  
- Developed a solution to aggregate events from multiple shared Nextcloud calendars.  
- Created a weekly newsletter to share event information with laboratory members.

**Philosophy:**  
- Focused on simplicity and maintainability (Less is more).

**Technologies Used:**  

- **API:**  
  - Built a custom API to interact with Nextcloud and retrieve event data.  
  - Handled data aggregation and transformation to ensure correct formatting for the newsletter.

- **PHP:**  
  - Used PHP to develop server-side logic for fetching and processing calendar events.  
  - Integrated with the API and managed newsletter generation.

- **SQLite:**  
  - A lightweight database was used to store event data locally, ensuring fast access and easy management.  
  - Used for temporary storage of aggregated events before they were included in the newsletter.

- **Shell Scripts:**  
  - Automating tasks such as fetching new event data, generating the newsletter, and sending it out.  
  - Scripts ensured the smooth operation of recurring tasks on a weekly basis.

- **No-code N8N:**  
  - Used N8N for automating the workflow between Nextcloud, the API, and the newsletter system.  
  - Enabled the integration of different services without writing extensive code.

- **Bootstrap:**  
  - Used Bootstrap for a responsive, mobile-friendly newsletter layout, ensuring consistency across different devices and screen sizes.  
  - Focused on clean design and usability for easy reading.

- **Smarty Templating Engine:**  
  - Used Smarty to separate the logic from the HTML structure in the newsletter.  
  - Allowed for easy customization and dynamic generation of newsletter content.

---
