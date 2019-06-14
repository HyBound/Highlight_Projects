# Live Project

## Introduction
For the last two weeks of my time at The Tech Academy, I worked with my peers in a team developing a full scale MVC Web Application in C#. Working on a legacy code-base was a great learning opportunity for fixing bugs, cleaning up code, and adding requested features. This project required deadlines and daily scrums to monitor progress. I saw how a good developer works with what they have to make a quality product. I worked on several [back end stories](#back-end-stories) that I am very proud of. Because much of the site had already been built, there were also a good deal of [front end stories](#front-end-stories) and UX improvements that needed to be completed, all of varying degrees of difficulty. It was required to work on multiple fronts fixing back-end issues and creating front-end solutions. Over the two week sprint I also had the opportunity to work on some other project management and team programming [skills](#other-skills-learned) that I'm confident I will use again and again on future projects.
  
Below are descriptions of the stories I worked on, along with code-snippets and navigation links. Because this is an ongoing project, I am unable to provide full files of the code.


## Back End Stories
* [Re-factor Schedule Index Logic](#re-factor-schedule-index-logic)

### Re-factor Schedule Index Logic

I was tasked with refactoring the way schedule items were shown in the schedule view. Instead of filtering by job and showing all schedules associated with that job, we wanted to create
a dictionary of a key/value pair of Job and List of Schedules associated with that job. This logic gate was complicated, but works well for multiple schedule views:
        
    protected Dictionary<Job, List<Schedule>> ViewSchedule(List<Schedule> schedules)
        {
            Job job = new Job();
            List<Job> jobs = new List<Job>();
            List<Schedule> dictSchedule = new List<Schedule>();
            var resultDictionary = new Dictionary<Job, List<Schedule>>();
            foreach (Schedule schedule in schedules)
            {
                if (job != schedule.Job && !jobs.Contains(schedule.Job))
                {
                    job = schedule.Job;
                    jobs.Add(job);
                    foreach (Schedule x in schedules)
                    {
                        if (x.Job == job)
                        {
                            dictSchedule.Add(x);
                        }
                    }
                    resultDictionary.Add(job, dictSchedule);
                }
            }
            return resultDictionary;
        }

*Jump to: [Front End Stories](#front-end-stories), [Back End Stories](#back-end-stories), [Other Skills](#other-skills-learned), [Page Top](#live-project)*


## Front End Stories
* [Suspended User View Rebuild](#suspended-user-rebuild)

### Suspended User Rebuild

I was tasked with changing the way Suspended users on the Admin page was handled by the site. This included redesigning existing Views and Controllers and building another Partial View page.
First, I needed to make sure suspended users did not appear in the Active Users partial:

    @foreach (var item in Model)
    {
            <!--Filters out suspended users. Goto SuspendedUserPartial View to view suspended users-->
            if (item.Suspended == true)
            {
                    continue;
            }

This was a simple "if" check to filter out suspended users. I then built the SuspendedUserPartial view using another "if" check to filter out everything BUT the suspended users:

    @model IEnumerable<ConstructionNew.Models.ApplicationUser>

    @{
            ViewBag.Title = "Suspended User List";
            var t = TempData["shortMessage"];
    }



    <table class="table">
            <tr>
                    <th>
                            @Html.DisplayNameFor(model => model.UserName)
                    </th>
                    <th>
                            @Html.DisplayNameFor(model => model.FName)
                    </th>
                    <th>
                            @Html.DisplayNameFor(model => model.LName)
                    </th>

                    <th>
                            @Html.DisplayNameFor(model => model.WorkType)
                    </th>
                    <th>
                            @Html.DisplayNameFor(model => model.UserRole)
                    </th>
                    <th>
                            @Html.DisplayNameFor(model => model.Suspended)
                    </th>
            </tr>

            @foreach (var item in Model)
            {
                    if (item.Suspended == true)
                    {
                    <tr>
                            <td>
                                    @Html.DisplayFor(modelItem => item.UserName)
                            </td>
                            <td>
                                    @Html.DisplayFor(modelItem => item.FName)

                            </td>
                            <td>
                                    @Html.DisplayFor(model => item.LName)
                            </td>
                            <td>
                                    @using (Html.BeginForm("EditWork", "Account", FormMethod.Post, new { enctype = "multipart/form-data" }))
                                    {
                                            @Html.Hidden("Id", item.Id)
                                            @Html.DropDownList("workType", new SelectList(ConstructionNew.Extensions.WorkTypeMethods.GetWorkTypeDescription()), ConstructionNew.Extensions.EnumExtensions.GetDescription(item.WorkType))
                                            <input type="submit" value="Submit" onclick="return confirm('Click ok to change category')" />
                                    }
                            </td>
                            <td>
                                    @using (Html.BeginForm("EditRole", "Account", FormMethod.Post, new { enctype = "multipart/form-data" }))
                                    {
                                            @Html.Hidden("Id", item.Id)
                                            @Html.DropDownList("UserRole", new List<SelectListItem>
                                            {
                                                    new SelectListItem { Text = "Admin", Value = "Admin"},
                                                    new SelectListItem { Text = "Manager", Value = "Manager"},
                                                    new SelectListItem { Text = "Employee", Value = "Employee"}
                                            }, item.UserRole)
                                            <input type="submit" value="Submit" onclick="return confirm('Click Ok to change role')" />}
                            </td>
                            <td>
                                    <!--Creates form for Suspend user and ties it to the "Suspend" method in the "AccountController" -->
                                    @using (Html.BeginForm("Suspend", "Account", FormMethod.Post, new { enctype = "multipart/form-data" }))
                                    {
                                            @Html.Hidden("Id", item.Id)
                                            <!--Creates checkbox for Suspend and binds it to the model attribute "Suspended"-->

                                            @Html.CheckBoxFor(model => item.Suspended, new { Name = "suspended" })
                                            {
                                                    <input type="submit" value="Submit" onclick="return confirm('Click Ok to confirm suspension')" />}
                                    }
                            </td>
                            <td>@Html.ActionLink("Delete User", "Delete", new { id = item.Id }, new { onclick = "return confirm('Press Ok to delete');" })</td>
                    </tr>
                    }
            }

    </table>

    @*@{
                    WebGrid wbgrid = new WebGrid(source: Model);
                    @wbgrid.GetHtml(
                                                    tableStyle:"table",
                                                    columns:new[]
                                                    {
                                                            wbgrid.Column("UserName", "User Name"),
                                                            wbgrid.Column("FName", "First Name"),
                                                            wbgrid.Column("LName", "Last Name"),
                                                            wbgrid.Column("WorkType", "Work Type"),
                                                            wbgrid.Column("UserRole", "User Role"),
                                                            wbgrid.Column(header:"Delete", format: @<text>@Html.ActionLink("X", "Delete", new { id = item.Id}, new { onclick="return confirm('Are you sure you want to delete User "+item.UserName+"?');"})</text>),
                                                            wbgrid.Column(header:"Update Role", format:@item => Html.DropDownList("UserRole", ViewBag.userrole as SelectList)),
                                                            wbgrid.Column(header: "Update", format:@<text>@Html.ActionLink("Update", "EditRole", new { id = item.Id}, new { onclick="return confirm('Are you sure you want to update User Role for "+item.UserName+"?');"  } )</text>)
                                                     })
            }*@

    @if (t != null)
    {
            <script type="text/javascript">
            window.onload = function () {
                alert("@ViewData["shortMessage"] This user is on the schedule, therefore cannot be deleted.")
            };

            </script>
    }

I then needed to add the Partial View to the dashboard view for Admin's underneath the User List Partial: 

    <div id="collapseUserList" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                    @Html.Action("_UserListPartial", "Account")
            </div>
    </div>
    <div id="collapseUserList" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                    @Html.Action("_SuspendedUserPartial", "Account")
            </div>
    </div>

Finally, I needed to add the Suspended User Partial to the Account Controller:

    public ActionResult _SuspendedUserPartial()
    {
        return PartialView(db.Users.AsEnumerable());
    }




### Password Requirement Tweak

I was tasked with fixing the password requirement box for the user-registration view. Previously, it would not validate the information in the password form and was placed very far away from the password box. 
This required both HTML and CSS changes.
HTML:

	<div class="form-group row">
		@Html.LabelFor(m => m.Password, new { @class = "col-md-2 control-label" })
		<div class="col-md-6 col-lg-6">
			@Html.PasswordFor(m => m.Password, new { @class = "form-control", @id = "passwordInput" })
		</div>
		<div class=" col-md-2 col-lg-2">
			<div id="pswd_info">
				<ul>
					<lh>Password must meet the following requirements:</lh>

					<li id="letter" class="invalid">At least <strong>one letter</strong></li>
					<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
					<li id="number" class="invalid">At least <strong>one number</strong></li>
					<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
					<li id="specialCharacter" class="invalid">Have at least 1 <strong>special character</strong></li>
				</ul>
			</div>
		</div>
	</div>
    
    <div class="form-group">
        @Html.LabelFor(m => m.ConfirmPassword, new { @class = "col-md-2 control-label"})
        <div class="col-md-10">
            @Html.PasswordFor(m => m.ConfirmPassword, new { @class = "form-control"})
        </div>
    </div>

CSS:

    @media (min-width: 1215px) {
        .container {
            width: 1230px;
            margin-left: 0;
            margin-right: 0;
        }
    }

    @media (min-width: 992px) {
        .container {
            width: inherit;
        }
    }

    ul, li {
        margin: 0;
        padding: 0;
        list-style-type: none;
        text-align: start;
        font-size: small;
    }

    #pswd_info {
	position: absolute;
	bottom: -125px;
	bottom: -115px\9;
	right: 135px;
	width: 250px;
	padding: 15px;
	background: #fefefe;
	font-size: .875em;
	border-radius: 5px;
	box-shadow: 0 1px 3px #ccc;
	border: 1px solid #ddd;
	display: inline-block;
	z-index: 1;
    }

    #pswd_info h4 {
        margin: 0 0 10px 0;
        padding: 0;
        font-weight: normal;
    }

    #pswd_info::before {
        content: "\25C0";
        position: absolute;
        top: 45%;
        left: -12px;
        font-size: 14px;
        line-height: 14px;
        color: #ddd;
        text-shadow: none;
        display: block;
    }

    .invalid {
        padding-left: 22px;
        line-height: 24px;
        color: #ec3f41;
    }

    .valid {
        padding-left: 22px;
        line-height: 24px;
        color: #3a7d34;
    }

*Jump to: [Front End Stories](#front-end-stories), [Back End Stories](#back-end-stories), [Other Skills](#other-skills-learned), [Page Top](#live-project)*

## Other Skills Learned
* Working with a group of developers to identify front- and back-end bugs to the improve usability of an application
* Improving project flow by following other developers' challenges and interactions with the same project files
* Learning new efficiencies from other developers by observing their work-flow
* Learning that commented code is MUCH more useful to maintain and fix, not to mention readable comments being even more necessary

*Jump to: [Front End Stories](#front-end-stories), [Back End Stories](#back-end-stories), [Other Skills](#other-skills-learned), [Page Top](#live-project)*
