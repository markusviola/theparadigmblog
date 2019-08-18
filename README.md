## The Paradigm Articles 

Hello, here I present my currently in development project. This was supposed to be just a skill test for us IT interns in our company, but ever since I read and studied about Laravel I decided to study it little by little, concurrently, as I'm also busy doing other projects.

My first commit was 4 months ago, but I think my overall development for this one is almost more than 1 and a half month already.  

### What's the catch with this app?

Well, in a general term, I'm developing a article web writing web application, since that's one of the most common projects you can do if you're trying out a technology. However, I have come to a point where I want to make this application similar to Medium & Facebook combined. *It's like an SNS for article writers.* 

I'm well aware that the code is still not to its peakest coding standards, but I've been refactoring it from time to time whenever I learn new stuffs. So, since this is just a learning grounds project, there's still much to experiment about, I want to add all kinds of stuffs here in this website.

### Technologies

Currently, I chose to develop this project in native Laravel framework without the Vue.js/React.js as frontend, solely because I want to explore Laravel in its rawest form, since I know I'll learn the most that way. (But trust me, Vue.js/React.js is a gift from the gods, it's so damn convenient using it.) Stuffs like how blades, controllers, & javascript AJAX communicate, middlewares, broadcasting and service providers and so on. 

There's so much in store that I want to try out in this project, currently I'm working on implementing a chat system for all users, and providing chat rooms for more private conversations through pushers and websockets. (I've been using in another personal project, but it's still really in its baby stage, so I'd like to put the deploying part aside for now.) I also want to use web sockets for other stuffs like notifications for users like announcements, things like that.

For the deployment, I bought my Ubuntu SSH server from DigitalOcean, and set it up with Nginx. I also got a domain from Namecheap, it's a 1 year free domain but it's better than using raw IP addresses right. 

## Current Progress

From here I'm gonna try to comprehensively elaborate the features that the website has, following with my upcoming plans with **my Facebook** + **Medium** goal. For my current progress, I focused in the functionalities rather than the design, thou I admit I'm not really that good with designing. So the CSS and responsiveness are still a work to be progressed.


**Current Features**

- **Login & Registration** (Made easier by Laravel with a few tweaks to make it my own.)
- **Home Page** - displays the list of articles
- **Side Bar (?)** - intially implemented in the home page, with search bar & hot topic list.
- **Create & Editing** Articles (Markdown feature) - you can post/edit posts with markdown styling.
- **User Restrictions** - used middlewares to restrict guest/regular and admin feature privileges.
- **View Article** - you can view the content of a created article, editing/deleting can be made if you're the owner/admin. 
- **Comments** - an applied feature in articles, same as stated, editing/deleting comments can be made if you're the owner/admin.
- **Profile Customization** - each registered users are given profiles that they can customize, like title, descriptions, and header images. They can also manage their posts here as it is also displayed here, like ediitng and deleting.
- **Profile URLs** - this are unique fields that users can use to link their profiles to other people. (username by default.)
- **Settings** - some registered information can be altered such as password and URLs. 
- **Notification **Toasters - this feature is for notifying users as feedback what whenever the process something or a restricted feature is accessed.
- **Pagination** - these things are implemented to all lists. (Except the comments, will do this soon.)
- **User Control** - an exclusive page for admins to view information of users and also activating/deactivating their accounts.
- **Article Post Control** - an exclusive page for admins to view overall post information, editing/deleting are also done here.
- **Comment Control** - an exclusive page for admins to view overall comments, editing/deleting are also done here.

That's pretty much all I can remember, I'll make sure to update this MD file from time to time. 

**Upcoming Features**

- **JSON Web Tokens (JWT)** - will apply this with some SSL implementation.
- **Chat System** - I'm gonna replicate Facebook's messenger for this. Websockets!
- **Push Notifications** - For announcements, or if a user likes or comments to your posts.
- **Post Tagging** - I should've done this much earlier, but better late than never. 
- **Friend Tagging** - If push notifications are applied, this will follow already.
- **Profile+** - There's a lot I want to add in this part, like profile pictures, statuses, photo galleries.
- **Voice/Video chatting** - I once tried the video chatting before, so I think voice chatting won't be that hard, I guess.
- **Comment Threading** - replies can be done for comments.
- **Likes for Comments** - Of course, we're copying Facebook right?
- **Markdown Auto Images** - dragging files in the markdown window uploads it to an RDS then recieves a link. 
- **So much more...**


