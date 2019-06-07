# Live Project

## Introduction
For the last two weeks of my time at The Tech Academy, I worked with my peers in a team developing a full scale MVC Web Application in C#. Working on a legacy code-base was a great learning opportunity for fixing bugs, cleaning up code, and adding requested features. This project required deadlines and daily scrums to monitor progress. I saw how a good developer works with what they have to make a quality product. I worked on several [back end stories](#back-end-stories) that I am very proud of. Because much of the site had already been built, there were also a good deal of [front end stories](#front-end-stories) and UX improvements that needed to be completed, all of varying degrees of difficulty. It was required to work on multiple fronts fixing back-end issues and creating front-end solutions. Over the two week sprint I also had the opportunity to work on some other project management and team programming [skills](#other-skills-learned) that I'm confident I will use again and again on future projects.
  
Below are descriptions of the stories I worked on, along with code-snippets and navigation links. Because this is an ongoing project, I am unable to provide full files of the code.


## Back End Stories





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




### Button Sizing Bug




*Jump to: [Front End Stories](#front-end-stories), [Back End Stories](#back-end-stories), [Other Skills](#other-skills-learned), [Page Top](#live-project)*

## Other Skills Learned
* Working with a group of developers to identify front- and back-end bugs to the improve usability of an application
* Improving project flow by following other developers' challenges and interactions with the same project files
* Learning new efficiencies from other developers by observing their work-flow
* Learning that commented code is MUCH more useful to maintain and fix, not to mention readable comments being even more necessary

*Jump to: [Front End Stories](#front-end-stories), [Back End Stories](#back-end-stories), [Other Skills](#other-skills-learned), [Page Top](#live-project)*
